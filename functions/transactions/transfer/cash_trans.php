<?php
include("../../connect.php");
session_start();
?>

<?php
// Session data declaration
$emailu = $_SESSION["email"];
$int_name = $_SESSION["int_name"];
$int_email = $_SESSION["int_email"];
$int_web = $_SESSION["int_web"];
$int_phone = $_SESSION["int_phone"];
$int_logo = $_SESSION["int_logo"];
$int_address = $_SESSION["int_address"];
$institutionId = $_SESSION["int_id"];
$nm = $_SESSION["username"];
$institutionId = $_SESSION['int_id'];
$user_id = $_SESSION["user_id"];
$digits = 6;
$tday = date('Y-m-d');
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
$getacct1 = mysqli_query($connection, "SELECT * FROM staff WHERE user_id = '$user_id' && int_id = '$institutionId'");
if (count([$getacct1]) == 1) {
    $uw = mysqli_fetch_array($getacct1);
    $staff_id = $uw["id"];
    $staff_email = $uw["email"];
}
$taketeller = "SELECT * FROM tellers WHERE name = '$staff_id' && int_id = '$institutionId'";

if (isset($_GET['approve'])) {
    // Declaring Variables
    $cacheId = $_GET['approve'];
    $cacheConditions = [
        'id' => $cacheId,
        'status' => "Pending",
        'int_id' => $institutionId
    ];
    $cahcheDetails = selectOne('transfer_cache', $cacheConditions);
    if (!$cahcheDetails) {
        $error = "Error: %s\n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry Transaction may already have been approved - " . $error;
        $_SESSION["Lack_of_intfund_$randms"] = "9";
        echo header("Location: ../../../mfi/transfer_approval.php?message9=$randms");
    }
    $transacionId = $cahcheDetails['transact_id'];
    $transferFrom = $cahcheDetails['trans_from'];
    $amount = $cahcheDetails['amount'];
    $transferTo = $cahcheDetails['trans_to'];
    $branchId = $cahcheDetails['branch_id'];
    $transactionDate = $cahcheDetails['trans_date'];
    

    $getacct1 = mysqli_query($connection, "SELECT * FROM staff WHERE user_id = '$userId' && int_id = '$institutionId'");
    if (count([$getacct1]) == 1) {
        $uw = mysqli_fetch_array($getacct1);
        $staff_id = $uw["id"];
        $staff_email = $uw["email"];
    }




    // find all sender info before procedding with transaction
    $senderConditions = [
        'account_no' => $transferFrom,
        'int_id' => $institutionId
    ];
    $senderDetails = selectOne('account', $senderConditions);
    if (!$senderDetails) {
        $error = "Error: %s\n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry " . $transferFrom . " account not found - " . $error;
        $_SESSION["Lack_of_intfund_$randms"] = "8";
        echo header("Location: ../../../mfi/transfer_approval.php?message8=$randms");
        exit();
        // send them back
    }
    $senderAccountBalance = $senderDetails['account_balance_derived'];
    $senderAccountId = $senderDetails['id'];
    $senderproductID = $senderDetails['product_id'];
    $senderclientId = $senderDetails['client_id'];
    $senderWithrawalBlance = $senderDetails['total_withdrawals_derived'];
    $senderNewBalance = $senderAccountBalance - $amount;
    $senderNewWithdrwalBalnce = $senderWithrawalBlance + $amount;


    // receivers info
    $receiverConditions = [
        'account_no' => $transferTo,
        'int_id' => $institutionId
    ];
    $receiverDetails = selectOne('account', $receiverConditions);
    if (!$receiverDetails) {
        $error = "Error: %s\n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry " . $transferTo . " account not found - " . $error;
        $_SESSION["Lack_of_intfund_$randms"] = "7";
        echo header("Location: ../../../mfi/transfer_approval.php?message7=$randms");
        exit();
        // send them back
    }
    $receiverAccountBalance = $receiverDetails['account_balance_derived'];
    $receiverAccountId = $receiverDetails['id'];
    $receiverproductID = $receiverDetails['product_id'];
    $receiverclientId = $receiverDetails['client_id'];
    $receiverDepositBalance = $receiverDetails['total_deposits_derived'];
    $receiverNewBalance = $receiverAccountBalance + $amount;
    $receiverDepositBalance = $receiverDepositBalance + $amount;
    // find senders' and  recevivers' name
    // create description
    $findSendersName = mysqli_query($connection, "SELECT display_name FROM client WHERE id = '$senderclientId'");
    $sender = mysqli_fetch_array($findSendersName);
    $fromName = $sender['display_name'];
    $findReceiversName = mysqli_query($connection, "SELECT display_name FROM client WHERE id = '$receiverclientId'");
    $receiver = mysqli_fetch_array($findReceiversName);
    $toName = $receiver['display_name'];
    $descriptionFrom = "Transfer frm " . $fromName . " to " . $toName;
    $descriptionTo = "Transfer to " . $toName . " frm " . $fromName;
    // we can now move on with the transactions
    // but first confirm is sender has enough money in thier account
    if ($senderAccountBalance >= $amount) {
        // continue transactions
        $senderUpdatedData = [
            'account_balance_derived' => $senderNewBalance,
            'total_withdrawals_derived' => $senderNewWithdrwalBalnce,
            'last_withdrawal' => $amount
        ];
        $updateSenderAccount =  update('account', $senderAccountId, 'id', $senderUpdatedData);
        if (!$updateSenderAccount) {
            $error = "Error: %s\n" . mysqli_error($connection); //checking for errors
            $_SESSION["feedback"] = $transferFrom . " account can not be DEBITED at the moment - " . $error;
            $_SESSION["Lack_of_intfund_$randms"] = "6";
            echo header("Location: ../../../mfi/transfer_approval.php?message6=$randms");
            exit();
            // send error could not update senders account
        } else {
            // store transaction data
            $senderTransactionDetails = [
                'int_id' => $institutionId,
                'branch_id' => $branchId,
                'amount' => $amount,
                'transaction_id' => $transacionId,
                'description' => $descriptionFrom,
                'account_no' => $transferFrom,
                'product_id' => $senderproductID,
                'client_id' => $senderclientId,
                'transaction_type' => "debit",
                'transaction_date' => $transactionDate,
                'overdraft_amount_derived' => $amount,
                'running_balance_derived' => $senderNewBalance,
                'cumulative_balance_derived' => $senderNewBalance,
                'appuser_id' => $userId,
                'debit' => $amount,
                'created_date' => $today
            ];

            $storeSenderTransaction =  insert('account_transaction', $senderTransactionDetails);
            if (!$storeSenderTransaction) {
                $error = "Error: %s\n" . mysqli_error($connection); //checking for errors
                $_SESSION["feedback"] = "Sorry Transaction incomplete " . $transferFrom . " DEBITED but trnasaction details not stored - " . $error;
                $_SESSION["Lack_of_intfund_$randms"] = "5";
                echo header("Location: ../../../mfi/transfer_approval.php?message5=$randms");
                exit();
            } else {
                //receivers transaction details
                $receiverUpdatedData = [
                    'account_balance_derived' => $receiverNewBalance,
                    'total_deposits_derived' => $receiverDepositBalance,
                    'last_deposit' => $amount
                ];
                $updateReceiverAccount =  update('account', $receiverAccountId, 'id', $receiverUpdatedData);
                if (!$updateReceiverAccount) {
                    $error = "Error: %s\n" . mysqli_error($connection); //checking for errors

                    $_SESSION["feedback"] = "Sorry can't credit " . $transferTo . " at the moment - " . $error;
                    $_SESSION["Lack_of_intfund_$randms"] = "4";
                    echo header("Location: ../../../mfi/transfer_approval.php?message4=$randms");
                    exit();
                } else {
                    // store revecivers transaction
                    $receiverTransactionDetails = [
                        'int_id' => $institutionId,
                        'branch_id' => $branchId,
                        'amount' => $amount,
                        'transaction_id' => $transacionId,
                        'description' => $descriptionTo,
                        'account_no' => $transferTo,
                        'product_id' => $receiverproductID,
                        'client_id' => $receiverclientId,
                        'transaction_type' => "credit",
                        'transaction_date' => $transactionDate,
                        'overdraft_amount_derived' => $amount,
                        'running_balance_derived' => $receiverNewBalance,
                        'cumulative_balance_derived' => $receiverNewBalance,
                        'appuser_id' => $userId,
                        'credit' => $amount,
                        'created_date' => $today
                    ];

                    $storeReceiverTransaction =  insert('account_transaction', $receiverTransactionDetails);
                    if (!$storeReceiverTransaction) {
                        $error = "Error: %s\n" . mysqli_error($connection); //checking for errors
                        // could not store receivers transaction
                        // otherwise transaction sucessful
                        $_SESSION["feedback"] = "Transaction Successful, could not store receivers transaction - $error";
                        $_SESSION["Lack_of_intfund_$randms"] = "2";
                        echo header("Location: ../../../mfi/transfer_approval.php?message1=$randms");
                        exit();
                    } else {
                        // output success message
                        $updateApprovalData = [
                            'status' => "Approved"
                        ];
                        $updateApproval =  update('transfer_cache', $cacheId, 'id', $updateApprovalData);
                        if (!$updateApproval) {
                            $error = "Error: %s\n" . mysqli_error($connection); //checking for errors
                            $_SESSION["feedback"] = "Transaction Successful but approval status not changed - $error";
                            $_SESSION["Lack_of_intfund_$randms"] = "1";
                            echo header("Location: ../../../mfi/transfer_approval.php?message3=$randms");
                            exit();
                        } else {
                            $_SESSION["feedback"] = "Transaction Successful";
                            $_SESSION["Lack_of_intfund_$randms"] = "1";
                            echo header("Location: ../../../mfi/transfer_approval.php?message0=$randms");
                        }
                    }
                }
            }
        }
    } else {
        // send back inssuficient funds feedback message
        $_SESSION["feedback"] = "Insufficent Funds in Client Account";
        $_SESSION["Lack_of_intfund_$randms"] = "2";
        echo header("Location: ../../../mfi/transfer_approval.php?message2=$randms");
    }
    # !ends here

    #isset ends here

} else if (isset($_GET['decline'])) {
    $fdf = $_GET['decline'];
    $we = mysqli_query($connection, "UPDATE transfer_cache SET status = 'Declined' WHERE id = '$fdf'");
    if ($we) {
        $_SESSION["feedback"] = "Successfully Declined";
        $_SESSION["Lack_of_intfund_$randms"] = "TELLER";
        echo header("Location: ../../../mfi/transfer_approval.php?message10=$randms");
    }
}
?>

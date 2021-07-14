<?php
// connection
include("connect.php");
session_start();
require_once "../bat/phpmailer/PHPMailerAutoload.php";
$int_name = $_SESSION["int_name"];
$int_email = $_SESSION["int_email"];
$branch_id = $_SESSION["branch_id"];
$submittedon_date = date('Y-m-d h:i:sa');
$submittedon_userid = $_SESSION['user_id'];

?>
<?php
$rigits = 7;
$sessint_id = $_SESSION["int_id"];
$
$ctype = strtoupper($_POST['ctype']);
$rand = str_pad(rand(0, pow(10, $rigits)-1), $rigits, '0', STR_PAD_LEFT);
$sessint_id = $_SESSION["int_id"];

$client_id = $_POST['client_id'];
$acct_type = $_POST['acct_type'];

$acctquery = mysqli_query($connection, "SELECT * FROM client WHERE id = '$client_id'");
if (count([$acctquery]) == 1) {
    $x = mysqli_fetch_array($acctquery);
    $int_id = $x['int_id'];
    $field_officer_id = $x['loan_officer_id'];
    $currency_code = "NGN";
    $activation_date = $x['activation_date'];
    $activation_userid = $x['loan_officer_id'];
    $account_balance_derived = 0;
}

$length = strlen($branch_id);
  if ($length == 2) {
    // if branch id is greater than one
    $digit = 7;
  } else if ($length == 3) {
    // greater than 2
    $digit = 6;
  } else if ($length == 4) {
    // greater than 3
    $digit = 5;
  } else {
    $digit = 8;
  }

  $randms = str_pad(rand(0, pow(10, $digit) - 1), $digit, '0', STR_PAD_LEFT);
  if(strlen($sessint_id) == 2){
    $institutionId =  substr($sessint_id, 1);
  }else if(strlen($sessint_id) == 3){
    $institutionId =  substr($sessint_id, 2);
  }else{
    $institutionId =  $sessint_id;
  }
  
 function account_no_generation($institutionId, $branch, $randms){
       $account_no = $institutionId . "" . $branch . "" . $randms;
        return $account_no;
    }
  $account_no = account_no_generation($institutionId, $branch, $randms);
  $condition = [
            'int_id' => $institutionId,
        ];
    $fetch_account_info = selectAll('account', $condition);
    foreach($fetch_account_info as $account_info){
    $fetched_account_no = $account_info['account_no'];
        if ($account_no == $fetched_account_no){
          $account_no = account_no_generation($institutionId, $branch, $randms);
        }
    }
  // add loop to check if account number already exists on the database if yes create account number again. 

$queryd = mysqli_query($connection, "SELECT * FROM savings_product WHERE id='$acct_type'");
$res = mysqli_fetch_array($queryd);
$accttname = $res['name'];
$type_id = $res['accounting_type'];

$accountins = "INSERT INTO account (int_id, branch_id, account_no, account_type,
type_id, product_id, client_id, field_officer_id, submittedon_date, submittedon_userid,
currency_code, activatedon_date, activatedon_userid,
account_balance_derived, updatedon_date) VALUES ('{$int_id}', '{$branch_id}', '{$account_no}',
'{$accttname}', '{$type_id}', '{$acct_type}', '{$client_id}', '{$field_officer_id}', '{$submittedon_date}',
'{$submittedon_userid}', '{$currency_code}', '{$activation_date}', '{$activation_userid}',
'{$account_balance_derived}', '{$submittedon_date}')";

$go = mysqli_query($connection, $accountins);
if ($go) {
    $_SESSION["Lack_of_intfund_$randms"] = "Registration Successful!";
    echo header ("Location: ../mfi/client.php?message3=$randms");
  } else {
     $_SESSION["Lack_of_intfund_$randms"] = "Registration Failed";
     echo "error";
    echo header ("Location: ../mfi/client.php?message4=$randms");
      // echo header("location: ../mfi/client.php");
  }
?>
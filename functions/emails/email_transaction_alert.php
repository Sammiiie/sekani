<?php
require_once "../bat/phpmailer/PHPMailerAutoload.php";
// check the type of that account number product and get the name
                      // SEND THE MAIL
                      // END THE ACCOUNT CHARGE
$mail = new PHPMailer;
$mail->From = $int_email;
$mail->FromName = $int_name;
$mail->addAddress($client_email, $clientt_name);
$mail->addReplyTo($int_email, "No Reply");
$mail->isHTML(true);
$mail->Subject = "Transaction Alert from $int_name";
$mail->Body = "
<!DOCTYPE html>
<html>

<head>
    <style>
        .lon {
            height: 100%;
            background-color: #eceff3;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .main {
            margin-right: auto;
            margin-left: auto;
            width: 550px;
            height: auto;
            background-color: white;

        }

        .header {
            margin-right: auto;
            margin-left: auto;
            width: 550px;
            height: auto;
            background-color: white;
        }

        .logo {
            margin-right: auto;
            margin-left: auto;
            width: auto;
            height: auto;
            background-color: white;

        }

        .text {
            padding: 20px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        table {
            padding: 30px;
            width: 100%;
        }

        table td {
            font-size: 15px;
            color: rgb(65, 65, 65);
        }
    </style>
</head>

<body>
    <div class='lon'>
        <div class='header'>
            <div class='logo'>
                <img style='margin-left: 200px; margin-right: auto; height:150px; width:150px;' class='img' src='$int_logo' />
            </div>
        </div>
        <div class='main'>
            <div class='text'>
                Dear $clientt_name,
                <h2 style='text-align:center;'>Notification of Debit Alert</h2>
                this is to notify you of an incoming debit to your account $acct_no,
                Kindly confirm with your bank.<br /><br />
                Please see the details below
            </div>
            <table>
                <tbody>
                    <div>
                        <tr>
                            <td> <b>Account Number</b></td>
                            <td>$account_display</td>
                        </tr>
                        <tr>
                            <td> <b>Account Name</b></td>
                            <td>$clientt_name</td>
                        </tr>
                        <tr>
                            <td> <b>Reference</b></td>
                            <td>$description</td>
                        </tr>
                        <tr>
                            <td> <b>Reference Id</b></td>
                            <td>$transid</td>
                        </tr>
                        <tr>
                            <td> <b>Transaction Amount</b></td>
                            <td>$amt</td>
                        </tr>
                        <tr>
                            <td> <b>Transaction Date/Time</b></td>
                            <td>$gen_date</td>
                        </tr>
                        <tr>
                            <td> <b>Value Date</b></td>
                            <td>$gends</td>
                        </tr>
                        <tr>
                            <td> <b>Account Balance</b></td>
                            <td>&#8358; $numberacct</td>
                        </tr>
                </tbody>
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
                <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
                <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
</body>
</table>
</div>
</div>
</body>

</html>            
";
$mail->AltBody = "This is the plain text version of the email content";

?>

"
<?php
include("connect.php");
session_start();
?>
<?php
$digits = 6;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
if (isset($_POST['id']) && isset($_POST['ctype'])) {
    $id = $_POST['id'];
    $ctype = $_POST['ctype'];
    $acct_type = $_POST['acct_type'];
    $display_name = $_POST['display_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $branch = $_POST['branch'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $bvn = $_POST['bvn'];
    if ( isset($_POST['sms_active']) ) {
        $sms_active = 1;
    } else {
        $sms_active = 0;
    }
    
    if ( isset($_POST['email_active']) ) {
        $email_active = 1;
    } else { 
        $email_active = 0;
    }    
    $id_card = $_POST['id_card'];
    // a new stuff for data upload
    $digits = 10;

    $temp = explode(".", $_FILES['signature']['name']);
    $randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    $image1 = $randms. '.' .end($temp);
    
    if (move_uploaded_file($_FILES['signature']['tmp_name'], "clients/" . $image1)) {
        $msg = "Image uploaded successfully";
    } else {
      $msg = "Image Failed";
    }
// $image2 = $_FILES['idimg']['name'];
// $target2 = "clients/".basename($image2);

$temp2 = explode(".", $_FILES['idimg']['name']);
$randms2 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
$image2 = $randms2. '.' .end($temp2);

if (move_uploaded_file($_FILES['idimg']['tmp_name'], "clients/" . $image2)) {
    $msg = "Image uploaded successfully";
} else {
  $msg = "Image Failed";
}

// $image3 = $_FILES['passport']['name'];
// $target3 = "clients/".basename($image3);

$temp3 = explode(".", $_FILES['passport']['name']);
$randms3 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
$image3 = $randms3. '.' .end($temp3);

if (move_uploaded_file($_FILES['passport']['tmp_name'], "clients/" . $image3)) {
    $msg = "Image uploaded successfully";
} else {
  $msg = "Image Failed";
}
// if (move_uploaded_file($_FILES['signature']['tmp_name'], $target1)) {
//     $msg = "Image uploaded successfully";
// }else{
//     $msg = "Failed to upload image";
// }
// if (move_uploaded_file($_FILES['idimg']['tmp_name'], $target2)) {
//     $msg = "Image uploaded successfully";
// }else{
//     $msg = "Failed to upload image";
// }
// if (move_uploaded_file($_FILES['passport']['tmp_name'], $target3)) {
//     $msg = "Image uploaded successfully";
// }else{
//     $msg = "Failed to upload image";
// }
    // $passport =$_POST['passport'];
    // $signature = $_POST['signature'];
    // $id_img_url = $_POST['id_img_url'];
// smalls
$updated_by = $_SESSION["user_id"];
$updated_on = date("Y-m-d");
$queryx = "UPDATE client SET client_type = '$ctype', account_type = '$acct_type', display_name = '$display_name',
firstname = '$first_name', lastname= '$last_name', middlename = '$middle_name',
mobile_no = '$phone', mobile_no_2 = '$phone2', ADDRESS = '$address', gender = '$gender',
date_of_birth = '$date_of_birth', branch_id = '$branch', COUNTRY = '$country', STATE_OF_ORIGIN = '$state',
LGA = '$lga', BVN = '$bvn', SMS_ACTIVE = '$sms_active',
EMAIL_ACTIVE = '$email_active', id_card = '$id_card', updated_by = '$updated_by', updated_on = '$updated_on',
id_img_url = '$image2', passport = '$image3', signature = '$image1' WHERE id = '$id'";

$result = mysqli_query($connection, $queryx);
if($result) {
    // If 'result' is successful, it will send the required message to client.php
    $_SESSION["Lack_of_intfund_$randms"] = " <php echo = $display_name?> was updated successfully!";
          echo header ("Location: ../mfi/client.php?message3=$randms");
        } else {
           $_SESSION["Lack_of_intfund_$randms"] = "Registration Failed";
           echo "error";
          echo header ("Location: ../mfi/client.php?message4=$randms");
            // echo header("location: ../mfi/client.php");
        }
if ($connection->error) {
    try {   
        throw new Exception("MySQL error $connection->error <br> Query:<br> $queryx", $mysqli->error);   
    } catch(Exception $e ) {
        echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
        echo nl2br($e->getTraceAsString());
    }
}
} else {
    echo "bad";
}
?>
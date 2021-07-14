<?php
include('../connect.php');

if(isset($_POST['expense'])){

$date = $_POST['transDate'];
$eod_validate = eod($date);
;

if ($eod_validate == 2){
    header("Location: ../../mfi/transact.php?response=manual_vault");
} else if ($eod_validate == 0){
    header("Location: expense.php");
}else{
    header ("Location: expense.php");
}

/*else if ($eod_validate == 1){
    header("Location: ../../mfi/transact.php?response=err");
} */
}
?>
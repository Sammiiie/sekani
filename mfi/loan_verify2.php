<?php
$loan_term = $_POST["loant"];
$repayment_start = $_POST["repay_start"];
$rep_every = $_POST["repay"];
$disburse_date = $_POST["disbd"];

$principal_amount = $_POST["prina"];
$interest_rate = $_POST["intr"] ;
$maxL = $_POST["max_Lamount"];
$minL = $_POST["min_Lamount"];
$maxint = $_POST["max_intrate"];
$minint = $_POST["min_intrate"];


if($minint > $interest_rate ) {
    echo '<label style="color: red;">Min Interest has not been met!</label';
}
else if($maxint >= $interest_rate){
    echo '';
}
else if($interest_rate > $maxint) {
    echo '<label style="color: red;">Max Interest has been exceeded!</label';
}
?>
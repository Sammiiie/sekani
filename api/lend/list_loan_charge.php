

<?php

header("Access-Control-Allow-Origin=> *");
header("Content-Type=> application/json; charset=UTF-8");

include_once '../config/database.php';
include_once 'loan.php';

$database = new Database();
$db = $database->getConnection();

$items = new Loan($db);

$items->product_loan_id = $_GET['product_loan_id'];
$items->int_id = $_GET['int_id'];

$stmt = $items->getLoanCharge();

$item_count = $stmt->rowCount();

if($item_count > 0){
	
	$loan_charge_arr = [];
	$loan_charge_arr["data"] = [];

	$loan_charge_arr["item_count"] = $item_count;

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$row;
		array_push($loan_charge_arr["data"], $row);
	}
	echo json_encode($loan_charge_arr);
}

else{
	http_response_code(404);
	echo json_encode(
		array("message" => "No record found.")
	);
}


?>

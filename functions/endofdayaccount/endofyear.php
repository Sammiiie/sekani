<?php
include('../connect.php');
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if (isset($_POST['endofyear'])) {
    // Perform End of Month
   $closedDate = $_POST['closedDate'];
    
    endOfYear($closedDate);
} else {
    // Generate End Of Month Report
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $branch = $_POST['branch'];

    $startDate_timestamp = strtotime($startDate.' 00:00:00');
    $endDate_timestamp = strtotime($endDate.' 24:00:00');

    $result = selectAll('endofyear_tb',['branch_id'=>$branch]);
    $generatedData = [];

    
    foreach($result as $r) {
        $created_on = strtotime($r['created_on']);
        if($created_on >= $startDate_timestamp && $created_on <= $endDate_timestamp) {
            // Get staff name
            $staff = selectAll('staff', ['id'=>$r['staff_id']]);
            $r['staff_name'] = $staff[0]['display_name'];
            // push data
            array_push($generatedData, $r);
        }
    }

    echo json_encode($generatedData);
}
?>


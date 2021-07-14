<?php
    include("connect.php");
    session_start();

    $loan_product = $_POST['loan_product'];
    $loan_amount = $_POST['loan_amount'];
    $interest = $_POST['interest'];
    $months_for_repayment = $_POST['months_for_repayment'];

    $repay_eve = 'month';
    $prin_amt = $loan_amount;
    $loan_term = $months_for_repayment;

    // Total interest
    if (strtolower($repay_eve) == "month") {
        $total_interest = ((($interest / 100) * $prin_amt) * $loan_term);
        $prin_due = $total_interest + $prin_amt;
    } else if (strtolower($repay_eve) == "week") {
        $term = $loan_term / 4;
        $total_interest = ((($interest / 100) * $prin_amt) * $term);
        $prin_due = $total_interest + $prin_amt;
    } else if (strtolower($repay_eve) == "day") {
        $term = $loan_term / 30;
        $total_interest = ((($interest / 100) * $prin_amt) * $term);
        $prin_due = $total_interest + $prin_amt;
    }
    
    // Monthly payments
    $sessint_id = $_SESSION["int_id"];
    $ln_prod =  mysqli_query($connection, "SELECT * FROM product WHERE id = '$loan_product' && int_id = '$sessint_id'");
    $pd = mysqli_fetch_array($ln_prod);
    $ln_prod_repay_frequency = $pd["repayment_frequency"];
    
    $monthly_payment = $prin_due / $ln_prod_repay_frequency;


    echo json_encode([
        'monthly_payments'=> $monthly_payment,
        'total_interest'=>$total_interest,
        'number_of_months'=>$loan_term
    ]);  

?>



    
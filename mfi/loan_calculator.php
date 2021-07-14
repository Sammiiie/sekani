<?php

$page_title = "Loan Calculator";
$destination = "";
include("header.php");



function fill_product($connection)
{
    $sint_id = $_SESSION["int_id"];
    $org = "SELECT * FROM product WHERE int_id = '$sint_id' ORDER BY name ASC";
    $res = mysqli_query($connection, $org);
    $output = '';
    while ($row = mysqli_fetch_array($res)) {
        $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }
    return $output;
}
?>




<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Loan Calculator</h4>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title text-center">Calculator</h4>
                        <p class="category"></p>
                      </div>
                      <div class="card-body">
                        <form id="loan-form">
                          <div class="form-group">
                            <label><b>Loan Product</b></label>
                            <select class="form-control" id = "loan_product" name="loans">
                             <option value="">select an option</option>
                              <?php echo fill_product($connection); ?>

                            </select>
                          </div>
                          <div class="form-group">
                            <label><b>Loan Amount</b></label>
                            <input class="form-control" id="loan_amount" type="number" placeholder="Enter loan amount" />
                          </div>
                          <div class="form-group">
                            <label><b>Interest</b></label>
                            <input class="form-control" id="interest" type="number"
                              placeholder="Enter interest amount" />
                          </div>
                          <div class="form-group">
                            <label><b>Months for Repay</b></label>
                            <input class="form-control" id="months_for_repayment" type="number" placeholder="Enter months repay" />
                          </div>
                          <div class="form-group">
                            <input type="submit" id = "loan_calculate" value="Calculate" class="btn btn-primary btn-block">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title text-center">Calculated Results</h4>

                      </div>
                      <div class="card-body text-center">
                        <div class="alert alert-info" role="alert">
                          <h4 id="monthlyPayment" style="color: white;">₦0</h4>
                          Monthly Payments
                        </div>
                        <div class="alert alert-success" role="alert">
                          <h4 id="totalInterest" style="color: white;">₦0</h4>
                          Total Interest
                        </div>
                        <div class="alert alert-primary" role="alert">
                          <h4 id="totalPayment" style="color: white;">0</h4>
                          Number of Months
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
<script>
  $(function(){
    $('#loan_calculate').click(e=>{
      e.preventDefault();

      var loan_product = $("#loan_product").val();
      var loan_amount = $("#loan_amount").val();
      var interest = $("#interest").val();
      var months_for_repayment = $("#months_for_repayment").val();

      if(loan_product.trim() == '' || loan_amount.trim() == '' || interest.trim() == '' || months_for_repayment.trim() == '') {
        alert('All fields are required!');
      } else {
        $.ajax({
            url:'../functions/loan_calculator.php',
            method: 'POST',
            data: {loan_product,loan_amount,interest,months_for_repayment},
            dataType: 'json',
            cache: false,
            success: function(res) {
              $('#monthlyPayment').text(res.monthly_payments);
              $('#totalInterest').text(res.total_interest);
              $('#totalPayment').text(res.number_of_months);
            },
            error: function(err) {
              console.log(err)
              swal({
                type: "error",
                title: "Error",
                text: "An error occurred during loan calculation",
                showConfirmButton: true,
                timer: 7000
              })
            }
        })
      }
    })
  })
</script>

<?php

include("footer.php");

?>
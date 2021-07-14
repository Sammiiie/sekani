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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">Calculator</h4>
                  <p class="category"></p>
                </div>
                <div class="card-body">
                  <form id="loan-form">
                    <div class="form-group">
                      <label><b>Disbursement Date</b></label>
                      <input class="form-control" id="" type="date" placeholder="" />
                    </div>
                    <div class="form-group">
                      <label><b>Loan Product</b></label>
                      <select class="form-control" id="loan_product" name="loans">
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
                      <input class="form-control" id="interest" type="number" placeholder="Enter interest amount" />
                    </div>
                    <div class="form-group">
                      <label><b>Months for Repay</b></label>
                      <input class="form-control" id="months_for_repayment" type="number" placeholder="Enter months repay" />
                    </div>
                    <div class="form-group">
                      <input type="submit" id="loan_calculate" value="Calculate" class="btn btn-primary btn-block">
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">Calculated Results</h4>

                </div>
                <div class="card-body text-center">
                 <div class="row">
                 <div class="col-md-12">
                      <table id="loan_cal" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Months</th>
                            <th>Disbursement Date</th>
                            <th>Principal Due</th>
                            <th>Principal Balance</th>
                            <th>Interest Due</th>
                            <th>Fees</th>
                            <th>Penalties</th>
                            <th>Total Due</th>
                            <th>Total Paid</th>
                            <th>Total Outstanding</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                          </tr>
                        </tbody>
                      </table>

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
</div>
<script>
$(document).ready(function() {
    $('#loan_cal').DataTable();
} );

  $(function() {
    $('#loan_calculate').click(e => {
      e.preventDefault();

      var loan_product = $("#loan_product").val();
      var loan_amount = $("#loan_amount").val();
      var interest = $("#interest").val();
      var months_for_repayment = $("#months_for_repayment").val();

      if (loan_product.trim() == '' || loan_amount.trim() == '' || interest.trim() == '' || months_for_repayment.trim() == '') {
        alert('All fields are required!');
      } else {
        $.ajax({
          url: '../functions/loan_calculator.php',
          method: 'POST',
          data: {
            loan_product,
            loan_amount,
            interest,
            months_for_repayment
          },
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
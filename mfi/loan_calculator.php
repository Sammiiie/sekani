<?php

$page_title = "Loan Calculator";
$destination = "";
include("header.php");
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
                            <select class="form-control" name="loans">
                              <option> Easy Loan </option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label><b>Loan Amount</b></label>
                            <input class="form-control" id="interest" type="number" placeholder="Enter interest amount" />
                          </div>
                          <div class="form-group">
                            <label><b>Interest</b></label>
                            <input class="form-control" id="interest" type="number"
                              placeholder="Enter interest amount" />
                          </div>
                          <div class="form-group">
                            <label><b>Months for Repay</b></label>
                            <input class="form-control" id="years" type="number" placeholder="Enter years repay" />
                          </div>
                          <div class="form-group">
                            <input type="submit" value="Calculate" class="btn btn-primary btn-block">
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
                          <h4 id="monthlyPayment" style="color: white;"></h4>
                          Monthly Payments
                        </div>
                        <div class="alert alert-success" role="alert">
                          <h4 id="totalInterest" style="color: white;"></h4>
                          Total Interest
                        </div>
                        <div class="alert alert-primary" role="alert">
                          <h4 id="totalPayment" style="color: white;"></h4>
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



<?php

include("footer.php");

?>
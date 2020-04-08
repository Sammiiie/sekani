<?php

$page_title = "Loan Disbursement";
$destination = "loans.php";
    include("header.php");

?>
<!-- Content added here -->
    <div class="content">
        <div class="container-fluid">
        <?php
          if (isset($_GET["message"])) {
            $key = $_GET["message"];
            $tt = 0;
            if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
              echo '<script type="text/javascript">
                    $(document).ready(function(){
                        swal({
                            type: "success",
                            title: "Success",
                            text: "Loan Submitted Successfully, Awaiting Approval",
                            showConfirmButton: false,
                            timer: 2000
                        })
                    });
                    </script>
                    ';
              $_SESSION["lack_of_intfund_$key"] = 0;
            }
          }else if (isset($_GET["message2"])) {
            $key = $_GET["message2"];
            $tt = 0;
            if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
              echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({
                        type: "error",
                        title: "Error",
                        text: "Error in Posting For Approval",
                        showConfirmButton: false,
                        timer: 2000
                    })
                });
                </script>
                ';
            $_SESSION["lack_of_intfund_$key"] = 0;
            }
          }else if (isset($_GET["message3"])) {
            $key = $_GET["message3"];
            $tt = 0;
            if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
              echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({
                        type: "error",
                        title: "Error",
                        text: "This Client Has Been Given Loan Before",
                        showConfirmButton: false,
                        timer: 2000
                    })
                });
                </script>
                ';
            $_SESSION["lack_of_intfund_$key"] = 0;
            }
          }else if (isset($_GET["message4"])) {
            $key = $_GET["message4"];
            $tt = 0;
            if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
              echo '<script type="text/javascript">
                  $(document).ready(function(){
                      swal({
                      type: "error",
                      title: "Error",
                      text: "Insufficent Fund From Institution Account!",
                      showConfirmButton: false,
                      timer: 2000
                  })
              });
              </script>
              ';
            $_SESSION["lack_of_intfund_$key"] = 0;
            }
          }else if (isset($_GET["message5"])) {
            $key = $_GET["message5"];
            $tt = 0;
            if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
            echo '<script type="text/javascript">
            $(document).ready(function(){
                swal({
                    type: "error",
                    title: "Error",
                    text: "Error in Posting For Loan Gaurantor",
                    showConfirmButton: false,
                    timer: 2000
                })
            });
            </script>
            ';
            $_SESSION["lack_of_intfund_$key"] = 0;
            }
          }
        ?>
          <!-- your content here -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Disburse Loan</h4>
                <p class="card-category">Fill in all important data</p>
              </div>
              <div class="card-body">
                <form>
                  <div class = "row">
                    <div class = "col-md-12">
                      <div class = "form-group">
                        <!-- First Tab Begins -->
                    <div class="tab"><h3> Terms:</h3>
                    <?php
                              // load user role data
                              function fill_product($connection) {
                                $sint_id = $_SESSION["int_id"];
                                $org = "SELECT * FROM product WHERE int_id = '$sint_id'";
                                $res = mysqli_query($connection, $org);
                                $output = '';
                                while ($row = mysqli_fetch_array($res))
                                {
                                  $output .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                }
                                return $output;
                              }
                              // a function for client data fill
                              function fill_client($connection) {
                                $sint_id = $_SESSION["int_id"];
                                $org = "SELECT * FROM client WHERE int_id = '$sint_id'";
                                $res = mysqli_query($connection, $org);
                                $out = '';
                                while ($row = mysqli_fetch_array($res))
                                {
                                  $out .= '<option value="'.$row["id"].'">'.$row["display_name"].'</option>';
                                }
                                return $out;
                              }
                              // a function for collateral
                              function fill_collateral($connection) {
                                $sint_id = $_SESSION["int_id"];
                                $org = "SELECT * FROM collateral WHERE int_id = '$sint_id'";
                                $res = mysqli_query($connection, $org);
                                $out = '';
                                while ($row = mysqli_fetch_array($res))
                                {
                                  $out .= '<option value="'.$row["id"].'">'.$row["type"].'</option>';
                                }
                                return $out;
                              }
                            ?>
                            <script>
                              $(document).ready(function() {
                                $('#charges').change(function(){
                                  var id = $(this).val();
                                  $.ajax({
                                    url:"load_data_lend.php",
                                    method:"POST",
                                    data:{id:id},
                                    success:function(data){
                                      $('#show_product').html(data);
                                    }
                                  })
                                });
                              })
                            </script>
                    <div class="col-md-4">
                      <label class = "bmd-label-floating">Client Name *:</label>
                        <select name="client_id" class="form-control" id="client_name">
                          <option value="">select an option</option>
                          <?php echo fill_client($connection); ?>
                        </select>
                        <label class="bmd-label-floating" >Product *:</label>
                        <select name="product_id" class="form-control" id="charges">
                          <option value="">select an option</option>
                          <?php echo fill_product($connection); ?>
                        </select>
                    </div>
                    <div class="col-md-12" id="show_product"></div>
                    </div>
                    <!-- First Tab Ends -->
                    <!-- Second Tab Begins -->
                    <div class="tab"><h3> Settings:</h3>
                    
                    </div>
                    <!-- Second Tab Ends -->
                    <!-- Third Tab Begins -->
                    <div class="tab"><h3> Charges:</h3>
                    <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Charge</th>
                              <th>Amount</th>
                              <th>Collected On</th>
                              <th>Date</th>
                              <th>Payment Mode</th>
                            </tr>
                          </thead>
                          <tbody>  
                             <tr>
                               <td>Valuation</td>
                               <td>Flat</td>
                               <td>10000</td>
                               <td>Disbursement</td>
                               <td></td>
                               <td>Normal</td>
                             </tr>
                             <tr>
                               <td>Search fee</td>
                               <td>Flat</td>
                               <td>23000</td>
                               <td>Disbursement</td>
                               <td></td>
                               <td>Normal</td>
                             </tr> 
                             <tr>
                               <td>Membership Gold</td>
                               <td>Flat</td>
                               <td>20000</td>
                               <td>Disbursement</td>
                               <td></td>
                               <td>Normal</td>
                             </tr>     
                          </tbody>
                        </table>
                        <div class="col-md-6">
                        <label class = "bmd-label-floating" for="charge" class="form-align mr-3">Charges</label>
                          <select class="form-control" name="charge">                                                
                            <option value="">Membership Bronze</option>
                          </select>
                          <button type="button" class="btn btn-primary" name="button" onclick="displayCharge()"> <i class="fa fa-plus"></i> Add To Product </button>
                      </div>
                    </div>
                    <!-- Third Tab Ends -->
                    <!-- Fourth Tab Begins -->
                    <div class="tab"><h3> Collateral:</h3>
                    <button type="button" class="btn btn-primary" name="button" onclick="dial()"> <i class="fa fa-plus"></i> Add</button>
                    <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Value</th>
                              <th>Description</th>
                            </tr>
                          </thead>
                          <tbody>  
                          <tr>
                               <td>Motorcycle</td>
                               <td>Flat</td>
                               <td>20000</td>
                             </tr>
                             <tr>
                               <td>Plot of Land</td>
                               <td>Flat</td>
                               <td>20000</td>
                             </tr>
                             <tr>
                               <td>Car</td>
                               <td>Flat</td>
                               <td>20000</td>
                             </tr>     
                          </tbody>
                        </table>
                        <!-- <style>
                          dialog{
                            background-color: #aaaaaa;
                          }
                        </style>
                        <dialog id="dial">
                          <h3>Add Collateral</h3>
                          <div class="form-group">
                          <label>Type</label>
                          <input class="form-control" type="text" value="Motor Cycles"/>
                          <label>Value</label>
                          <input class="form-control" type="text" value="10000"/>
                          <label>Description</label>
                          <input class="form-control" type="text" value="Test"/>
                          </div>
                          <div style="float:right;">
                            <button class="btn btn-primary pull-right" type="button" id="">Add</button>
                            <button class="btn btn-primary pull-right" type="button" id="">Cancel</button>
                          </div>
                        </dialog> -->
                    </div>
                    <!-- Fourth Tab Ends -->
                    <!-- Fifth Tab Begins -->
                    <div class="tab"><h3> Guarantors:</h3>
                      <div class="form-group">
                      <button type="button" class="btn btn-primary" name="button" onclick="dial()"> <i class="fa fa-plus"></i> Add</button>
                      </div>
                      <div class="form-group">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Guarantor Type</th>
                              <th>Guarantee Amount</th>
                            </tr>
                          </thead>
                          <tbody>  
                          <tr>
                               <td>abcde</td>
                               <td>New Guarantor</td>
                               <td>20000</td>
                             </tr>
                             <tr>
                               <td>vwxyz</td>
                               <td>New Guarantor</td>
                               <td>20000</td>
                             </tr>   
                          </tbody>
                        </table>
                      </div>
                      <!-- <div class="form-group">
                        <dialog>
                        <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class = "bmd-label-floating" class="md-3 form-align " for=""> First Name:</label>
                                  <input type="text" name="gau_first_name" id="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class = "bmd-label-floating" for=""> Last Name:</label>
                                  <input type="text" name="gau_last_name" id="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class = "bmd-label-floating" for="">Phone:</label>
                                  <input type="text" name="gau_phone" id="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class = "bmd-label-floating" for="">Phone:</label>
                                    <input type="text" name="gau_phone2" id="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class = "bmd-label-floating" for="">Home Address:</label>
                                    <input type="text" name="gau_home_address" id="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class = "bmd-label-floating" for="">Office Address:</label>
                                    <input type="text" name="gau_office_address" id="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class = "bmd-label-floating" for="">Position Held:</label>
                                    <input type="text" name="gau_position_held" id="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class = "bmd-label-floating" class = "bmd-label-floating">Email:</label>
                                  <input type="text" name="gau_email" id="" class="form-control">
                                </div>
                              </div>
                            </div> -->
                        </dialog>
                      </div>
                    </div>
                    <!-- Fifth Tab Ends -->
                    <!-- Sixth Tab Begins -->
                    <div class="tab"><h3> Repayment Schedule:</h3>
                      <div class="form-group">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Date</th>
                              <th>Days</th>
                              <th>Disbursement</th>
                              <th>Principal Due</th>
                              <th>Principal Balance</th>
                              <th>Interest Due</th>
                              <th>Fees</th>
                              <th>Total Due</th>
                            </tr>
                          </thead>
                          <tbody>  
                          <tr>
                               <td>01-06-2020</td>
                               <td>40</td>
                               <td>79000</td>
                               <td>10000</td>
                               <td>70000</td>
                               <td></td>
                               <td>4800</td>
                               <td>3250</td>
                               <td>4000</td>
                             </tr>
                             <tr>
                               <td>07-01-2020</td>
                               <td>20</td>
                               <td>69000</td>
                               <td>15000</td>
                               <td></td>
                               <td>70000</td>
                               <td>6600</td>
                               <td>3175</td>
                               <td>4040</td>
                             </tr>
                             <tr>
                               <td>09-10-2020</td>
                               <td>30</td>
                               <td>10000</td>
                               <td>43000</td>
                               <td></td>
                               <td>60000</td>
                               <td>5600</td>
                               <td>4250</td>
                               <td>5500</td>
                             </tr>
                             <tr>
                               <td>01-02-2020</td>
                               <td>60</td>
                               <td>20000</td>
                               <td></td>
                               <td>13000</td>
                               <td>70000</td>
                               <td>4300</td>
                               <td>2950</td>
                               <td>2300</td>
                             </tr>   
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Sixth Tab Ends -->
                    <!-- Seventh Tab Begins -->
                    <div class="tab"><h3> Overview:</h3>
                          <div class="row">
                            <!-- <div class="my-3"> -->
                              <!-- replace values with loan data -->
                              <div class=" col-md-6 form-group">
                                <label class = "bmd-label-floating">Loan size:</label>
                                <input type="number" value="" name="principal_amount" class="form-control" required id="ls">
                              </div>
                              <div class="col-md-6 form-group">
                                <label class = "bmd-label-floating">Loan Term:</label>
                                <input type="number" id="lt" name="loan_term" class="form-control" />
                              </div>
                              <div class="col-md-6 form-group">
                                <label class = "bmd-label-floating">Interest Rate per:</label>
                                <input type="text" value="" name="repay_every" class="form-control" id="irp">
                              </div>
                              <div class="col-md-6 form-group">
                                <label class = "bmd-label-floating">Interest Rate:</label>
                                <input type="text" name="interest_rate" class="form-control" id="ir">
                              </div>
                              <div class="col-md-6 form-group">
                                <label class = "bmd-label-floating">Disbusrsement Date:</label>
                                <input type="date" name="disbursement_date" class="form-control" id="db">
                              </div>
                              <div class="col-md-6 form-group">
                                <label class = "bmd-label-floating">Loan Officer:</label>
                                <input type="text" name="loan_officer" class="form-control" id="lo">
                              </div>
                              <div class="col-md-6 form-group">
                                <label class = "bmd-label-floating">Loan Purpose:</label>
                                <input type="text" name="loan_purpose" class="form-control" id="lp">
                              </div>
                              <div class="col-md-6 form-group">
                                <label class = "bmd-label-floating">Linked Savings account:</label>
                                <input type="text" name="linked_savings_acct" class="form-control" id="lsa">
                              </div>
                              <div class="col-md-6 form-group">
                                <label class = "bmd-label-floating">Repayment Start Date:</label>
                                <input type="date" name="repay_start" class="form-control" id="rsd">
                              </div>
                            <!-- </div> -->
                          </div>
                    </div>
                    <!-- Seventh Tab Ends -->
                    <!-- Buttons -->
                    <div style="overflow:auto;">
                          <div style="float:right;">
                            <button class="btn btn-primary pull-right" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            <button class="btn btn-primary pull-right" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                          </div>
                        </div>
                      <!-- Steppers -->
                      <!-- Circles which indicates the steps of the form: -->
                      <div style="text-align:center;margin-top:40px;">
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

                  
                  <!-- /stepper  -->
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                 Get session data and populate user profile 
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Sekani Systems
                  </p>
                   <a href="#pablo" class="btn btn-primary btn-round">Follow</a> 
                </div>
              </div>
            </div> -->
          </div>
          <!-- /content -->
        </div>
      </div>
      <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

/* #regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
} */

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #a13cb6;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #9e38b5;
}
</style>
      <script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("form").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<?php

    include("footer.php");

?>
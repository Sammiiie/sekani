<?php

$page_title = "Edit Product";
$destination = "connect.php";
include("header.php");

?>
<?php
if (isset($_GET["edit"])) {
  $user_id = $_GET["edit"];
  $update = true;
  $value = mysqli_query($connection, "SELECT * FROM savings_product WHERE id='$user_id' && int_id='$sessint_id'");

  if ($value) {
    $n = mysqli_fetch_array($value);
    $int_id = $n['int_id'];
    $name = $n['name'];
    $short_name = $n['short_name'];
    $description = $n['description'];
    $accounting_type = $n['accounting_type'];
    $saving_cat = $n['savings_cat'];
    $auto_renew = $n['auto_create'];
    $currency_code = $n['currency_code'];
    $noml_al_int_rate = $n['nominal_annual_interest_rate'];
    $interest_compounding_period_enum = $n['interest_compounding_period_enum'];
    $interest_posting_period_enum = $n['interest_posting_period_enum'];
    $interest_calculation_type_enum = $n['interest_calculation_type_enum'];
    $interest_calculation_days_in_year_type_enum = $n['interest_calculation_days_in_year_type_enum'];
    $min_required_opening_balance = $n['min_required_opening_balance'];
    $min_balance_for_interest_calculation = $n['min_balance_for_interest_calculation'];
    $minimum_negative_balance = $n['minimum_negative_balance'];
    $maximum_positve_balance = $n['maximum_positve_balance'];
    $lockin_period_frequency = $n['lockin_period_frequency'];
    $lockin_period_frequency_enum = $n['lockin_period_frequency_enum'];
    $allow_overdraft = $n['allow_overdraft'];
    $is_dormancy_tracking_active = $n['is_dormancy_tracking_active'];
    $enable_withdrawal_notice = $n['enable_withdrawal_notice'];

    if ($accounting_type == "1") {
      $prod_type = "Current";
    } else if ($accounting_type == "2") {
      $prod_type = "Savings";
    } else if ($accounting_type == "3") {
      $prod_type = "Fixed-Deposit";
    }

    if ($saving_cat == "1") {
      $savings_cat = "Voluntary";
    } else if ($saving_cat == "2") {
      $savings_cat = "Compulsory";
    }

    if ($auto_renew == "1") {
      $autocreate = "Yes";
    } else if ($auto_renew == "2") {
      $autocreate = "No";
    }

    if ($interest_compounding_period_enum == "1") {
      $compound_period = "Daily";
    } else if ($interest_compounding_period_enum == "2") {
      $compound_period = "Monthly";
    } else if ($interest_compounding_period_enum == "3") {
      $compound_period = "Quarterly";
    } else if ($interest_compounding_period_enum == "4") {
      $compound_period = "Bi-Annually";
    } else if ($interest_compounding_period_enum == "5") {
      $compound_period = "Annually";
    }

    if ($interest_posting_period_enum == "1") {
      $int_post_type = "Daily";
    } else if ($interest_posting_period_enum == "2") {
      $int_post_type = "Monthly";
    } else if ($interest_posting_period_enum == "3") {
      $int_post_type = "Quarterly";
    } else if ($interest_posting_period_enum == "4") {
      $int_post_type = "Bi-Annually";
    } else if ($interest_posting_period_enum == "5") {
      $int_post_type = "Annually";
    }

    if ($interest_calculation_type_enum == "1") {
      $int_cal_type = "Daily Balance";
    } else if ($interest_calculation_type_enum == "2") {
      $int_cal_type = "Average Daily Balance";
    }

    if ($interest_calculation_days_in_year_type_enum == "360") {
      $int_cal_days = "360 days";
    } else if ($interest_calculation_days_in_year_type_enum == "365") {
      $int_cal_days = "365 days";
    }

    if ($lockin_period_frequency_enum == "1") {
      $lock_per_freq_time = "Days";
    } else if ($lockin_period_frequency_enum == "2") {
      $lock_per_freq_time = "Weeks";
    } else if ($lockin_period_frequency_enum == "3") {
      $lock_per_freq_time = "Months";
    } else if ($lockin_period_frequency_enum == "4") {
      $lock_per_freq_time = "Years";
    }

    if ($allow_overdraft == "1") {
      $allover = "Yes";
    } else if ($allow_overdraft == "2") {
      $allover = "No";
    }
    if ($is_dormancy_tracking_active == "1") {
      $trk_dormancy = "Yes";
    } else if ($is_dormancy_tracking_active == "2") {
      $trk_dormancy = "No";
    }
    if ($enable_withdrawal_notice == "1") {
      $with_notice = "Yes";
    } else if ($enable_withdrawal_notice == "2") {
      $with_notice = "No";
    }
  }

  $dsopq = "SELECT * FROM savings_acct_rule WHERE int_id = '$sessint_id' AND savings_product_id = '$user_id'";
  $fdq = mysqli_query($connection, $dsopq);
  $l = mysqli_fetch_array($fdq);
  $asst_loan_port = $l['asst_loan_port'];
  $li_overpayment = $l['li_overpayment'];
  $li_suspended_income = $l['li_suspended_income'];
  $inc_interest = $l['inc_interest'];
  $inc_fees = $l['inc_fees'];
  $inc_penalties = $l['inc_penalties'];
  $inc_recovery = $l['inc_recovery'];
  $bvn_income = $l['bvn_income'];
  $bvn_expense = $l['bvn_expense'];
  $exp_loss_written_off = $l['exp_loss_written_off'];
  $exp_interest_written_off = $l['exp_interest_written_off'];
  $insufficient_repayment = $l['insufficient_repayment'];

  $abc = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$asst_loan_port'");
  $a = mysqli_fetch_array($abc);
  $ast_ln_prt = $a['name'];

  $def = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$li_overpayment'");
  $b = mysqli_fetch_array($def);
  $li_overnt = $b['name'];

  $ghi = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$li_suspended_income'");
  $c = mysqli_fetch_array($ghi);
  $li_susd_ime = $c['name'];

  $jkl = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$inc_interest'");
  $d = mysqli_fetch_array($jkl);
  $inc_inst = $d['name'];

  $mno = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$inc_fees'");
  $e = mysqli_fetch_array($mno);
  $inc_fes = $e['name'];

  $pqr = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$inc_penalties'");
  $f = mysqli_fetch_array($pqr);
  $inc_pees = $f['name'];

  $stu = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$inc_recovery'");
  $g = mysqli_fetch_array($stu);
  $inc_reco = $g['name'];

  $vw = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$exp_loss_written_off'");
  $h = mysqli_fetch_array($vw);
  $exp_los_wttn_off = $h['name'];

  $xy = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$exp_interest_written_off'");
  $i = mysqli_fetch_array($xy);
  $exp_int_wttn_off = $i['name'];

  $op = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$insufficient_repayment'");
  $k = mysqli_fetch_array($op);
  $insuf_rymnt = $k['name'];

  $op = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$bvn_income'");
  $t = mysqli_fetch_array($op);
  $bvn_incme = $t['name'];

  $op = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$bvn_expense'");
  $f = mysqli_fetch_array($op);
  $bvn_exp = $f['name'];
}
?>
<div class="content">
  <div class="container-fluid">
    <!-- your content here -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Update Product</h4>
            <p class="card-category">Fill in all important data</p>
          </div>
          <form id="form" action="../functions/product_savings_update.php" method="POST">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <!-- First tab -->
                    <div class="tab">
                      <h3> Update Account Product:</h3>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name *:</label>
                            <input type="text" value="<?php echo $name; ?>" name="name" class="form-control" id="" required>
                            <input type="text" hidden value="<?php echo $user_id; ?>" name="sav_id" class="form-control" id="sav_id">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="shortLoanName">Short Loan Name *</label>
                            <input type="text" value="<?php echo $short_name; ?>" class="form-control" name="short_name" value="" placeholder="Short Name..." required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="loanDescription">Description *</label>
                            <input type="text" value="<?php echo $description; ?>" class="form-control" name="description" value="" placeholder="Description...." required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="installmentAmount">Account Type</label>
                            <select class="form-control" name="accounting_type">
                              <option hidden value="<?php echo $accounting_type; ?>"><?php echo $prod_type; ?></option>
                              <option value="1">Current</option>
                              <option value="2">Savings</option>
                              <option value="3">Fixed-Deposit</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="installmentAmount">Savings Category</label>
                            <select class="form-control" name="saving_cat">
                              <option hidden value="<?php echo $saving_cat; ?>"><?php echo $savings_cat; ?></option>
                              <option value="1">Voluntary</option>
                              <option value="2">Compulsory</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="installmentAmount">Auto Create</label>
                            <select class="form-control" name="auto_renew">
                              <option hidden value="<?php echo $auto_renew; ?>"><?php echo $autocreate; ?></option>
                              <option value="2">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="installmentAmount">Currency</label>
                            <select class="form-control" name="currency">
                              <option value="NGN">Nigerian Naira(NGN)</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="shortLoanName">Nominal Annual Interest rate</label>
                            <input type="text" value="<?php echo $noml_al_int_rate; ?>" class="form-control" name="noml_al_int_rate" value="" placeholder="enter value" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="installmentAmount">Compounding Period</label>
                            <select class="form-control" name="interest_compounding_period_enum">
                              <option hidden value="<?php echo $interest_compounding_period_enum; ?>"><?php echo $compound_period; ?></option>
                              <option value="1">Daily</option>
                              <option value="2">Monthly</option>
                              <option value="3">Quarterly</option>
                              <option value="4">Bi-Annually</option>
                              <option value="5">Annually</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="interestRateApplied">Interest Posting period Type</label>
                            <select class="form-control" name="interest_posting_period_enum">
                              <option hidden value="<?php echo $interest_posting_period_enum; ?>"><?php echo $int_post_type; ?></option>
                              <option value="1">Daily</option>
                              <option value="2">Monthly</option>
                              <option value="3">Quarterly</option>
                              <option value="4">Bi-Annually</option>
                              <option value="5">Annually</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6" hidden>
                          <div class="form-group">
                            <label for="interestMethodology">Interest Calculation Type</label>
                            <select class="form-control" name="interest_calculation_type_enum">
                              <option hidden value="<?php echo $interest_calculation_type_enum; ?>"><?php echo $int_cal_type; ?></option>
                              <option value="1">Daily Balance</option>
                              <option value="2">Average Daily Balance</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="amortizatioMethody">Interest Calculation Days in Year type</label>
                            <select class="form-control" name="interest_calculation_days_in_year_type_enum" required>
                              <option hidden value="<?php echo $interest_calculation_days_in_year_type_enum; ?>"><?php echo $int_cal_days; ?></option>
                              <option value="360">360 days</option>
                              <option value="365">365 days</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="shortLoanName">Minimum Balance *</label>
                            <input type="number" value="<?php echo $min_required_opening_balance; ?>" class="form-control" name="min_required_opening_balance" value="" placeholder="1000" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="shortLoanName">Mininmum Balance for Interest Calculation *</label>
                            <input type="number" value="<?php echo $min_balance_for_interest_calculation; ?>" class="form-control" name="min_balance_for_interest_calculation" value="" placeholder="10" required>
                          </div>
                        </div>
                        <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="shortLoanName" >Maximum Positive Balance*</label>
                        <input type="number" value="<?php echo $maximum_positve_balance; ?>" class="form-control" name="maximum_positve_balance" value="" placeholder="100,000,000.00" required>
                      </div>
                    </div> -->
                        <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="shortLoanName" >Minimum Negative Balance</label>
                        <input type="number" value="<?php echo $minimum_negative_balance; ?>" class="form-control" name="minimum_negative_balance" value="" placeholder="-20000" required>
                      </div>
                    </div> -->
                        <div class="col-md-6" hidden>
                          <div class="form-group">
                            <label for="principal">Lockin Period Frequency</label>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="number" value="<?php echo $lockin_period_frequency; ?>" class="form-control" name="lockin_period_frequency" value="" placeholder="Default" required>
                              </div>
                              <div class="col-md-8">
                                <select class="form-control" name="lockin_period_frequency_enum">
                                  <option hidden value="<?php echo $lockin_period_frequency_enum; ?>"><?php echo $lock_per_freq_time; ?></option>
                                  <option value="1">Days</option>
                                  <option value="2">Weeks</option>
                                  <option value="3">Months</option>
                                  <option value="4">Years</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6" hidden>
                          <div class="form-group">
                            <label for="additionalCharges">Allow OverDraft</label>
                            <select class="form-control" name="allow_overdraft" required>
                              <option hidden value="<?php echo $allow_overdraft; ?>"><?php echo $allover; ?></option>
                              <option value="2">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6" hidden>
                          <div class="form-group">
                            <label for="additionalCharges">Track Dormancy</label>
                            <select class="form-control" name="is_dormancy_tracking_active" required>
                              <option hidden value="<?php echo $is_dormancy_tracking_active; ?>"><?php echo $trk_dormancy; ?></option>
                              <option value="2">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>
                        </div>
                        <!-- <div class="col-md-6">
                       <div class="form-group">
                          <label for="additionalCharges" >Enable Withdrawal Notice</label>
                          <select class="form-control" name="enable_withdrawal_notice" required>
                          <option hidden value="<?php echo $enable_withdrawal_notice; ?>"><?php echo $with_notice; ?></option>
                            <option value="2">No</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                      </div> -->
                      </div>
                    </div>
                    <!-- First tab -->
                    <!-- Second tab -->
                    <div class="tab">
                      <h3> Interest Rate Chart:</h3>
                      <div class="form-group">
                        <button type="button" class="btn btn-primary" name="button" onclick="showDialog()"> <i class="fa fa-plus"></i> Add</button>
                      </div>
                      <div class="form-group">
                        <script>
                          $(document).ready(function() {
                            $('#clickit').on("change keyup paste click", function() {
                              var id = $('#sav_id').val();
                              var name = $('#nam').val();
                              var start = $('#start').val();
                              var end = $('#end').val();
                              var intrate = $('#intrate').val();
                              var desc = $('#desc').val();
                              $.ajax({
                                url: "ajax_post/update_int_rate_chart.php",
                                method: "POST",
                                data: {
                                  id: id,
                                  name: name,
                                  start: start,
                                  end: end,
                                  intrate: intrate,
                                  desc: desc
                                },
                                success: function(data) {
                                  $('#coll').html(data);
                                }
                              })
                            });
                          });
                        </script>
                        <!-- <button class="btn btn-primary pull-right" id="clickit">Add</button> -->
                        <div id="coll">
                          <table class="table table-bordered">
                            <thead>
                              <?php
                              $query = "SELECT * FROM interest_rate_chart WHERE int_id = '$sessint_id' AND savings_id = '$user_id' ORDER BY id DESC";
                              $result = mysqli_query($connection, $query);
                              ?>
                              <tr>
                                <th>Name</th>
                                <th>From Date</th>
                                <th>End Date</th>
                                <th>Interest Rate</th>
                                <th>Description</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                  <tr>
                                    <?php $row["id"]; ?>
                                    <th><?php echo $row["name"]; ?></th>

                                    <th><?php echo $row["start_date"]; ?></th>
                                    <th><?php echo $row["end_date"]; ?></th>
                                    <th><?php echo $row["interest_rate"]; ?></th>
                                    <th><?php echo $row["description"]; ?></th>
                                    <td><a href="" class="btn btn-danger">Delete</a></td>
                                  </tr>
                              <?php }
                              } else {
                                // echo "0 Document";
                              }
                              ?>
                              <!-- <th></th> -->
                            </tbody>
                          </table>
                        </div>

                      </div>
                      <!-- dialog box -->
                      <div class="form-group">
                        <div id="background">
                        </div>
                        <div id="diallbox">
                          <!-- <form method="POST" action="lend.php" > -->
                          <h3>Add Interest Rate</h3>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating" class="md-3 form-align " for=""> Name:</label>
                              <input type="text" name="col_name" id="nam" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating" for="">Start Date</label>
                              <input type="date" name="col_value" id="start" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating" for="">End Date:</label>
                              <input type="date" name="col_description" id="end" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating" for="">Interest Rate:</label>
                              <input type="number" name="col_value" id="intrate" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating" for="">Description:</label>
                              <input type="text" name="col_value" id="desc" class="form-control">
                            </div>
                          </div>
                          <div style="float:right;">
                            <span class="btn btn-primary pull-right" id="clickit" onclick="AddDlg()">Add</span>
                            <span class="btn btn-primary pull-right" onclick="AddDlg()">Cancel</span>
                          </div>
                          <!-- </form> -->
                          <script>
                            function AddDlg() {
                              var bg = document.getElementById("background");
                              var dlg = document.getElementById("diallbox");
                              bg.style.display = "none";
                              dlg.style.display = "none";
                            }

                            function showDialog() {
                              var bg = document.getElementById("background");
                              var dlg = document.getElementById("diallbox");
                              bg.style.display = "block";
                              dlg.style.display = "block";

                              var winWidth = window.innerWidth;
                              var winHeight = window.innerHeight;

                              dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
                              dlg.style.top = "150px";
                            }
                          </script>
                          <style>
                            #background {
                              display: none;
                              width: 100%;
                              height: 100%;
                              position: fixed;
                              top: 0px;
                              left: 0px;
                              background-color: black;
                              opacity: 0.7;
                              z-index: 9999;
                            }

                            #diallbox {
                              /*initially dialog box is hidden*/
                              display: none;
                              position: fixed;
                              width: 480px;
                              z-index: 9999;
                              border-radius: 10px;
                              padding: 20px;
                              background-color: #ffffff;
                            }
                          </style>
                        </div>
                      </div>
                    </div>
                    <!-- Second tab -->
                    <!-- Third tab -->
                    <div class="tab">
                      <?php
                      // load user role data
                      function fill_charges($connection)
                      {
                        $sint_id = $_SESSION["int_id"];
                        $org = "SELECT * FROM charge WHERE int_id = '$sint_id' && charge_applies_to_enum = '1' && is_active = '1'";
                        $res = mysqli_query($connection, $org);
                        $output = '';
                        while ($row = mysqli_fetch_array($res)) {
                          $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                        }
                        return $output;
                      }
                      ?>
                      <h3>Charges</h3>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <label>Charges:</label>
                            <input id="sde" type="text" value="<?php echo $user_id; ?>" hidden />
                            <select name="charge_id" class="form-control" id="charges">
                              <option value="">select an option</option>
                              <?php echo fill_charges($connection); ?>
                            </select>
                          </div>
                          <script>
                            $(document).ready(function() {
                              $('#charges').on("change", function() {
                                var id = $(this).val();
                                var user = $('#sav_id').val();
                                $.ajax({
                                  url: "ajax_post/update_savings_product_table.php",
                                  method: "POST",
                                  data: {
                                    id: id,
                                    user: user
                                  },
                                  success: function(data) {
                                    $('#idd').html(data);
                                  }
                                })
                              });
                            });
                          </script>
                          <div id="idd" class="col-md-12">
                            <table id="tabledat4" class="table" style="width: 100%;">
                              <thead class=" text-primary">
                                <?php
                                $query = "SELECT * FROM savings_product_charge WHERE int_id ='$sessint_id' AND savings_id = '$user_id'";
                                $result = mysqli_query($connection, $query);
                                ?>
                                <th>Name</th>
                                <th>Charge</th>
                                <th>Collected On</th>
                                <th>Delete</th>
                              </thead>
                              <tbody>
                                <?php if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                    <tr>
                                      <?php
                                      $did = $row['id'];
                                      $charge_id = $row['charge_id'];
                                      $fid = "SELECT * FROM charge WHERE int_id = '$sessint_id' AND id ='$charge_id'";
                                      $dfdf = mysqli_query($connection, $fid);
                                      $d = mysqli_fetch_array($dfdf);
                                      $name = $d['name'];
                                      $amt = $d['amount'];
                                      $ds = $d['charge_calculation_enum'];
                                      $values = $d["charge_time_enum"];
                                      if ($ds == 1) {
                                        $chg = $amt . " Flat";
                                      } else {
                                        $chg = $amt . "% of Loan Principal";
                                      }
                                      if ($values == 1) {
                                        $xs = "Disbursement";
                                      } else if ($values == 2) {
                                        $xs = "Manual Charge";
                                      } else if ($values == 3) {
                                        $xs = "Savings Activiation";
                                      } else if ($values == 5) {
                                        $xs = "Deposit Fee";
                                      } else if ($values == 6) {
                                        $xs = "Annual Fee";
                                      } else if ($values == 8) {
                                        $xs = "Installment Fees";
                                      } else if ($values == 9) {
                                        $xs = "Overdue Installment Fee";
                                      } else if ($values == 12) {
                                        $xs = "Disbursement - Paid With Repayment";
                                      } else if ($values == 13) {
                                        $xs = "Loan Rescheduling Fee";
                                      }
                                      ?>
                                      <th><?php echo $name; ?></th>
                                      <th><?php echo $chg; ?></th>
                                      <th><?php echo $xs; ?></th>
                                      <td>
                                        <div data-id='<?= $did; ?>' class="test"><a class="btn btn-danger">Delete</a></div>
                                      </td>
                                    </tr>
                                <?php }
                                } else {
                                  // echo "0 Document";
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Third tab -->
                    <!-- Fourth tab -->
                    <div class="tab">
                      <div class="row">
                        <!-- replace values with loan data -->
                        <div class="col-md-6">
                          <h5 class="card-title">Accounting Rules</h5>
                          <div class="position-relative form-group ">
                            <div>
                              <div class="custom-radio custom-control">
                                <input type="radio" id="cashBased" checked name="acc" class="custom-control-input">
                                <label class="custom-control-label" for="cashBased">Cash Based</label>
                              </div>
                              <div class="custom-radio custom-control">
                                <input type="radio" id="accuralP" disabled name="acc" class="custom-control-input">
                                <label class="custom-control-label" for="accuralP">Accural (Periodic)</label>
                              </div>
                              <div class="custom-radio custom-control">
                                <input type="radio" id="accuralU" disabled name="acc" class="custom-control-input">
                                <label class="custom-control-label" for="accuralU">Accural (Upfront)</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">

                          <h5 class="card-title"></h5>
                          <div hidden class="position-relative form-group">
                            <div class="form-group">
                              <?php
                              function fill_asset($connection)
                              {
                                $sint_id = $_SESSION["int_id"];
                                $org = "SELECT * FROM `acc_gl_account` WHERE int_id = '$sint_id' && classification_enum = '1' ORDER BY name ASC";
                                $res = mysqli_query($connection, $org);
                                $output = '';
                                while ($row = mysqli_fetch_array($res)) {
                                  $output .= '<option value = "' . $row["gl_code"] . '"> ' . strtoupper($row["name"]) . ' </option>';
                                }
                                return $output;
                              }
                              ?>
                              <!-- <div class="col-md-8">
                              <label for="charge" class="form-align">Fund Source</label>
                              <select class="form-control form-control-sm" name="asst_fund_src">
                                <option value="">--</option>
                              </select>
                              </div> -->
                            </div>
                            <div class="form-group" hidden>
                              <div class="col-md-8">
                                <label for="charge" class="form-align">Insufficient Repayment</label>
                                <select class="form-control form-control-sm" name="insufficient_repayment">
                                  <option hidden value="<?php echo $insufficient_repayment; ?>"><?php echo $insuf_rymnt; ?></option>
                                  <?php echo fill_asset($connection) ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <h5 class="card-title">Assets</h5>
                          <?php
                          function fill_lia($connection)
                          {
                            $sint_id = $_SESSION["int_id"];
                            $org = "SELECT * FROM `acc_gl_account` WHERE int_id = '$sint_id' && classification_enum = '1' ORDER BY name ASC";
                            $res = mysqli_query($connection, $org);
                            $output = '';
                            while ($row = mysqli_fetch_array($res)) {
                              $output .= '<option value = "' . $row["gl_code"] . '"> ' . strtoupper($row["name"]) . ' </option>';
                            }
                            return $output;
                          }
                          ?>
                          <div class="position-relative form-group">
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Savings Portfolio</label>
                                <select class="form-control form-control-sm" name="asst_loan_port">
                                  <option hidden value="<?php echo $asst_loan_port; ?>"><?php echo $ast_ln_prt; ?></option>
                                  <?php echo fill_asset($connection) ?>
                                </select>
                              </div>
                            </div>
                            <div hidden class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Overpayments</label>
                                <select class="form-control form-control-sm" name="li_overpayment">
                                  <option hidden value="<?php echo $li_overpayment; ?>"><?php echo $li_overnt; ?></option>
                                  <?php echo fill_lia($connection) ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Suspended Income</label>
                                <select class="form-control form-control-sm" name="li_suspended_income">
                                  <option hidden value="<?php echo $li_suspended_income; ?>"><?php echo $li_susd_ime; ?></option>
                                  <?php echo fill_lia($connection) ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <!-- next -->

                        </div>

                        <div class="col-md-6">
                          <h5 class="card-title">Income</h5>
                          <div class="position-relative form-group">
                            <div class="form-group">
                              <?php
                              function fill_in($connection)
                              {
                                $sint_id = $_SESSION["int_id"];
                                $org = "SELECT * FROM `acc_gl_account` WHERE int_id = '$sint_id' && classification_enum = '4' ORDER BY name ASC";
                                $res = mysqli_query($connection, $org);
                                $output = '';
                                while ($row = mysqli_fetch_array($res)) {
                                  $output .= '<option value = "' . $row["gl_code"] . '"> ' . strtoupper($row["name"]) . ' </option>';
                                }
                                return $output;
                              }
                              ?>
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Income for Interest</label>
                                <select class="form-control form-control-sm" name="inc_interest">
                                  <option hidden value="<?php echo $inc_interest; ?>"><?php echo $inc_inst; ?></option>
                                  <?php echo fill_in($connection) ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Income from Fees</label>
                                <select class="form-control form-control-sm" name="inc_fees">
                                  <option hidden value="<?php echo $inc_fees; ?>"><?php echo $inc_fes; ?></option>
                                  <?php echo fill_in($connection) ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Income from Penalties</label>
                                <select class="form-control form-control-sm" name="inc_penalties">
                                  <option hidden value="<?php echo $inc_penalties; ?>"><?php echo $inc_pees; ?></option>
                                  <?php echo fill_in($connection) ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Income from Recovery</label>
                                <select class="form-control form-control-sm" name="inc_recovery">
                                  <option hidden value="<?php echo $inc_recovery; ?>"><?php echo $inc_reco; ?></option>
                                  <?php echo fill_in($connection) ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">BVN Income</label>
                                <select class="form-control form-control-sm" name="bvn_income">
                                  <option hidden value="<?php echo $bvn_income; ?>"><?php echo $bvn_incme; ?></option>
                                  <?php echo fill_in($connection) ?>
                                </select>
                              </div>
                            </div>
                          </div>

                        </div>

                        <div class="col-md-6">
                          <h5 class="card-title">Expenses</h5>
                          <div class="position-relative form-group">
                            <?php
                            function fill_exp($connection)
                            {
                              $sint_id = $_SESSION["int_id"];
                              $org = "SELECT * FROM `acc_gl_account` WHERE int_id = '$sint_id' && classification_enum = '5' ORDER BY name ASC";
                              $res = mysqli_query($connection, $org);
                              $output = '';
                              while ($row = mysqli_fetch_array($res)) {
                                $output .= '<option value = "' . $row["gl_code"] . '"> ' . $row["name"] . ' </option>';
                              }
                              return $output;
                            }
                            ?>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Losses Written Off</label>
                                <select class="form-control form-control-sm" name="exp_loss_written_off">
                                  <option hidden value="<?php echo $exp_loss_written_off; ?>"><?php echo $exp_los_wttn_off; ?></option>
                                  <?php echo fill_exp($connection) ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">Interest Written Off</label>
                                <select class="form-control form-control-sm" name="exp_interest_written_off">
                                  <option hidden value="<?php echo $exp_interest_written_off; ?>"><?php echo $exp_int_wttn_off; ?></option>
                                  <?php echo fill_exp($connection) ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label for="charge" class="form-align ">BVN Expense</label>
                                <select class="form-control form-control-sm" name="bvn_expense">
                                  <option hidden value="<?php echo $bvn_expense; ?>"><?php echo $bvn_exp; ?></option>
                                  <?php echo fill_exp($connection) ?>
                                </select>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>


                      <!-- </div> -->
                    </div>
                  </div>
                  <!-- Fourth tab -->
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
                  </div>
                </div>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
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
      document.getElementById("nextBtn").innerHTML = "Update";
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
        valid = true; // This was change to true to disable the validation function. Should be reverted to FALSE after testing is complete
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
<script>
  $(document).ready(function() {

    // Delete 
    $('.test').click(function() {
      var el = this;

      // Delete id
      var id = $(this).data('id');

      var confirmalert = confirm("Delete this charge?");
      if (confirmalert == true) {
        // AJAX Request
        $.ajax({
          url: 'ajax_post/ajax_delete/delete_savings_charge.php',
          type: 'POST',
          data: {
            id: id
          },
          success: function(response) {

            if (response == 1) {
              // Remove row from HTML Table
              $(el).closest('tr').css('background', 'tomato');
              $(el).closest('tr').fadeOut(700, function() {
                $(this).remove();
              });
            } else {
              alert('Invalid ID.');
            }
          }
        });
      }
    });
  });
</script>
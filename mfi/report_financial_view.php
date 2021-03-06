<?php

$page_title = "Financial Report";
$destination = "report_financial.php";
include("header.php");
// session_start();
$branch = $_SESSION['branch_id'];
$sessint_id = $_SESSION['int_id'];
?>
<?php
function branch_opt($connection)
{
  $br_id = $_SESSION["branch_id"];
  $sint_id = $_SESSION["int_id"];
  $dff = "SELECT * FROM branch WHERE int_id ='$sint_id' AND id = '$br_id' || parent_id = '$br_id'";
  $dof = mysqli_query($connection, $dff);
  $out = '';
  while ($row = mysqli_fetch_array($dof)) {
    $do = $row['id'];
    $out .= " OR client.branch_id ='$do'";
  }
  return $out;
}
$br_id = $_SESSION["branch_id"];
$branches = branch_opt($connection);
?>
<?php
if (isset($_GET["view26"])) {
?>
  <!-- Content added here -->
  <div class="content">
    <div class="container-fluid">
      <!-- your content here -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Financial Provisioning</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="form-group col-md-3">
                    <?php
                    function fill_branch($connection)
                    {
                        $sint_id = $_SESSION["int_id"];
                        $org = "SELECT * FROM branch WHERE int_id = '$sint_id'";
                        $res = mysqli_query($connection, $org);
                        $out = '';
                        while ($row = mysqli_fetch_array($res)) {
                            $out .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                        }
                        return $out;
                    }
                    ?>
                    <label for="">Branch</label>
                    <select name="branch_id" id="branch_id" class="form-control">
                        <?php echo fill_branch($connection); ?>
                    </select>
                  </div>
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <span id="runFPR" class="btn btn-success" type="submit">Run report</span>
              </form>
            </div>
          </div>

          <script>
            $(document).ready(function() {
                $('#runFPR').on("click", function() {
                    var branch_id = $('#branch_id').val();
                    $.ajax({
                        url: "ajax_post/provision.php",
                        method: "POST",
                        data: {
                            branch_id: branch_id
                        },
                        success: function(data) {
                            $('#provision-result').html(data);
                        }
                    })
                });
            });
          </script>
        </div>
        
        <div class="col-12">

          <div id="provision-result"></div>

        </div>

      </div>

    </div>

  </div>

<?php
} else if (isset($_GET["view25"])) {
?>
  <div class="content">
    <div class="container-fluid">
      <!-- your content here -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">General Ledger Report</h4>
            </div>
            <?php
            function fill_gl($connection)
            {
              $sint_id = $_SESSION["int_id"];
              // $org = "SELECT * FROM acc_gl_account WHERE int_id = '$sint_id' AND (parent_id != '0' || parent_id != '' || parent_id != 'NULL') ORDER BY name ASC";
              $org = "SELECT * FROM acc_gl_account WHERE parent_id !='0' AND int_id = '$sint_id' ORDER BY name ASC";
              $res = mysqli_query($connection, $org);
              $out = '';
              while ($row = mysqli_fetch_array($res)) {
                $out .= '<option value="' . $row["gl_code"] . '">' . $row["gl_code"] . ' - ' . $row["name"] . '</option>';
              }
              return $out;
            }
            function fill_branch($connection)
            {
              $sint_id = $_SESSION["int_id"];
              $dks = $_SESSION["branch_id"];
              $org = "SELECT * FROM branch WHERE int_id = '$sint_id' AND id = '$dks' OR parent_id = '$dks'";
              $res = mysqli_query($connection, $org);
              $out = '';
              while ($row = mysqli_fetch_array($res)) {
                $out .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
              }
              return $out;
            }
            ?>

            <div class="card-body">
              <form action="">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="">Start Date</label>
                    <input type="date" name="" id="start" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">End Date</label>
                    <input type="date" name="" id="end" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Branch</label>
                    <select name="" id="branch" class="form-control">
                      <?php echo fill_branch($connection); ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">GL account</label>
                    <select name="gl_code" id="glcode" class="form-control">
                      <?php echo fill_gl($connection); ?>
                    </select>
                  </div>
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <span id="runstructure" type="submit" class="btn btn-primary">Run report</span>
              </form>
            </div>
          </div>
          <script>
            $(document).ready(function() {
              $('#runstructure').on("click", function() {
                var start = $('#start').val();
                var end = $('#end').val();
                var branch = $('#branch').val();
                var glcode = $('#glcode').val();
                $.ajax({
                  url: "items/gl_report.php",
                  method: "POST",
                  data: {
                    start: start,
                    end: end,
                    branch: branch,
                    glcode: glcode
                  },
                  success: function(data) {
                    $('#shstructure').html(data);
                  }
                })
              });
            });
          </script>
          <div id="shstructure" class="card">

          </div>
        </div>
      </div>

    </div>
  </div>
<?php
} else if (isset($_GET["view29"])) {
?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header card-header-primary">
                      <h4 class="card-title">Generate Trial Balance</h4>
                  </div>
                  <div class="card-body">
                      <form action="">
                          <div class="row">
                              <div class="form-group col-md-3">
                                  <label for="">Start Date</label>
                                  <input type="date" name="" id="start" class="form-control">
                              </div>
                              <div class="form-group col-md-3">
                                  <label for="">End Date</label>
                                  <input type="date" name="" id="end" class="form-control">
                              </div>
                              <?php
                              function fill_branch($connection)
                              {
                                $sint_id = $_SESSION["int_id"];
                                $org = "SELECT * FROM branch WHERE int_id = '$sint_id'";
                                $res = mysqli_query($connection, $org);
                                $out = '';
                                while ($row = mysqli_fetch_array($res)) {
                                  $out .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                }
                                return $out;
                              }
                              ?>
                              <div class="form-group col-md-3">
                                  <label for="">Branch</label>
                                  <select name="" id="branch_id" class="form-control">
                                    <?php echo fill_branch($connection); ?>
                                  </select>
                              </div>
                          </div>
                          <button type="reset" class="btn btn-danger">Reset</button>
                          <span id="generateTBR" type="submit" class="btn btn-success">Run report</span>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <script>
        $(document).ready(function() {
            $('#generateTBR').on("click", function() {
                var start = $('#start').val();
                var end = $('#end').val();
                var branch_id = $('#branch_id').val();

                $.ajax({
                    url: "ajax_post/trial_balance.php",
                    method: "POST",
                    data: {
                        start: start,
                        end: end,
                        branch_id: branch_id
                    },
                    success: function(data) {
                        $('#showTrialBalance').html(data);
                    }
                })
            });
        });
      </script>

      <div id="showTrialBalance">
      
      </div>
      
    </div>
  </div>

<?php
} else if (isset($_GET["view43"])) {
?>
  <div class="content">
    <div class="container-fluid">
      <!-- your content here -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Daily Transactions</h4>

              <!-- Insert number users institutions -->
              <p class="card-category">
                <?php
                $currentdate = date('Y-m-d');
                $query = "SELECT * FROM institution_account_transaction WHERE branch_id = '$branch' AND int_id = '$sessint_id' AND transaction_date = '$currentdate'";
                $result = mysqli_query($connection, $query);
                if ($result) {
                  $inr = mysqli_num_rows($result);
                  echo $inr;
                } ?> transactions made today</p>
            </div>
            <div class="card-body">
              <div class="form-group">
                <form method="POST" action="../composer/today_transaction.php">
                  <input hidden name="id" type="text" value="<?php echo $id; ?>" />
                  <input hidden name="start" type="text" value="<?php echo $start; ?>" />
                  <input hidden name="end" type="text" value="<?php echo $currentdate; ?>" />
                  <button type="submit" id="disbursed" class="btn btn-primary pull-left">Download PDF</button>
                  <script>
                    $(document).ready(function() {
                      $('#disbursed').on("click", function() {
                        swal({
                          type: "success",
                          title: "DISBURSED LOAN REPORT",
                          text: "Printing Successful",
                          showConfirmButton: false,
                          timer: 3000

                        })
                      });
                    });
                  </script>
                </form>
              </div>
              <div class="table-responsive">
                <table class="rtable display nowrap" style="width:100%">
                  <thead class=" text-primary">
                    <?php
                    $query = "SELECT * FROM institution_account_transaction WHERE branch_id = '$branch' AND int_id = '$sessint_id' AND transaction_date = '$currentdate'";
                    $result = mysqli_query($connection, $query);
                    ?>
                    <tr class="table100-head">
                      <th>Transaction Type</th>
                      <th>Transaction Date</th>
                      <th>Reference</th>
                      <th>Account Officer</th>
                      <th>Debits(&#8358;)</th>
                      <th>Credits(&#8358;)</th>
                      <th>Account Balance(&#8358;)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                          <th><?php echo $row["transaction_type"]; ?></th>
                          <th><?php echo $row["transaction_date"]; ?></th>
                          <th><?php echo $row["description"]; ?></th>
                          <?php
                          $name = $row['appuser_id'];
                          $anam = mysqli_query($connection, "SELECT username FROM users WHERE id = '$name'");
                          $f = mysqli_fetch_array($anam);
                          $nae = strtoupper($f["username"]);
                          ?>
                          <th><?php echo $nae; ?></th>
                          <th><?php echo number_format($row["debit"]); ?></th>
                          <th><?php echo number_format($row["credit"]); ?></th>
                          <th><?php echo number_format($row["running_balance_derived"], 2); ?></th>
                          <?php

                          ?>
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
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
} else if (isset($_GET["view47"])) {
?>
  <div class="content">
    <div class="container-fluid">
      <!-- your content here -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Asset Register Report</h4>
            </div>
            <?php
            function fill_branch($connection)
            {
              $sint_id = $_SESSION["int_id"];
              $dks = $_SESSION["branch_id"];
              $org = "SELECT * FROM branch WHERE int_id = '$sint_id' AND id = '$dks' OR parent_id = '$dks'";
              $res = mysqli_query($connection, $org);
              $out = '';
              while ($row = mysqli_fetch_array($res)) {
                $out .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
              }
              return $out;
            }
            ?>

            <div class="card-body">
              <form action="">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="">Start Date</label>
                    <input type="date" name="" id="start" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">End Date</label>
                    <input type="date" name="" id="end" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Branch</label>
                    <select name="" id="branch" class="form-control">
                      <?php echo fill_branch($connection); ?>
                    </select>
                  </div>
                  <?php
                  function fill_asset($connection)
                  {
                    $sint_id = $_SESSION["int_id"];
                    $org = "SELECT * FROM asset_type WHERE int_id = '$sint_id'";
                    $res = mysqli_query($connection, $org);
                    $out = '';
                    while ($row = mysqli_fetch_array($res)) {
                      $out .= '<option value="' . $row["id"] . '">' . $row["asset_name"] . '</option>';
                    }
                    return $out;
                  }
                  ?>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Type of Asset:</label>
                      <select id="asstype" class="form-control" style="text-transform: uppercase;" name="ass_type">
                        <option value="0">ALL</option>
                        <?php echo fill_asset($connection); ?>
                      </select>
                    </div>
                  </div>
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <span id="runstructure" type="submit" class="btn btn-primary">Run report</span>
              </form>
            </div>
          </div>
          <script>
            $(document).ready(function() {
              $('#runstructure').on("click", function() {
                var start = $('#start').val();
                var end = $('#end').val();
                var branch = $('#branch').val();
                var asstype = $('#asstype').val();
                $.ajax({
                  url: "ajax_post/asset_regist.php",
                  method: "POST",
                  data: {
                    start: start,
                    end: end,
                    branch: branch,
                    asstype: asstype
                  },
                  success: function(data) {
                    $('#shstructure').html(data);
                  }
                })
              });
            });
          </script>
          <div id="shstructure" class="card">

          </div>
        </div>
      </div>

    </div>
  </div>
<?php
} else if (isset($_GET["view43"])) {
?>
  <div class="content">
    <div class="container-fluid">
      <!-- your content here -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Daily Transactions</h4>

              <!-- Insert number users institutions -->
              <p class="card-category">
                <?php
                $currentdate = date('Y-m-d');
                $query = "SELECT * FROM institution_account_transaction WHERE branch_id = '$branch' AND int_id = '$sessint_id' AND transaction_date = '$currentdate'";
                $result = mysqli_query($connection, $query);
                if ($result) {
                  $inr = mysqli_num_rows($result);
                  echo $inr;
                } ?> transactions made today</p>
            </div>
            <div class="card-body">
              <div class="form-group">
                <form method="POST" action="../composer/today_transaction.php">
                  <input hidden name="id" type="text" value="<?php echo $id; ?>" />
                  <input hidden name="start" type="text" value="<?php echo $start; ?>" />
                  <input hidden name="end" type="text" value="<?php echo $currentdate; ?>" />
                  <button type="submit" id="disbursed" class="btn btn-primary pull-left">Download PDF</button>
                  <script>
                    $(document).ready(function() {
                      $('#disbursed').on("click", function() {
                        swal({
                          type: "success",
                          title: "DISBURSED LOAN REPORT",
                          text: "Printing Successful",
                          showConfirmButton: false,
                          timer: 3000

                        })
                      });
                    });
                  </script>
                </form>
              </div>
              <div class="table-responsive">
                <table class="rtable display nowrap" style="width:100%">
                  <thead class=" text-primary">
                    <?php
                    $query = "SELECT * FROM institution_account_transaction WHERE branch_id = '$branch' AND int_id = '$sessint_id' AND transaction_date = '$currentdate'";
                    $result = mysqli_query($connection, $query);
                    ?>
                    <tr class="table100-head">
                      <th>Transaction Type</th>
                      <th>Transaction Date</th>
                      <th>Reference</th>
                      <th>Account Officer</th>
                      <th>Debits(&#8358;)</th>
                      <th>Credits(&#8358;)</th>
                      <th>Account Balance(&#8358;)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                          <th><?php echo $row["transaction_type"]; ?></th>
                          <th><?php echo $row["transaction_date"]; ?></th>
                          <th><?php echo $row["description"]; ?></th>
                          <?php
                          $name = $row['appuser_id'];
                          $anam = mysqli_query($connection, "SELECT username FROM users WHERE id = '$name'");
                          $f = mysqli_fetch_array($anam);
                          $nae = strtoupper($f["username"]);
                          ?>
                          <th><?php echo $nae; ?></th>
                          <th><?php echo number_format($row["debit"]); ?></th>
                          <th><?php echo number_format($row["credit"]); ?></th>
                          <th><?php echo number_format($row["running_balance_derived"], 2); ?></th>
                          <?php

                          ?>
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
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>
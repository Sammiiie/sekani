<?php

$page_title = "Chart of Account";
$destination = "accounting.php";
include("header.php");
?>
<?php
//  Sweet alert Function

// If it is successfull, It will show this message
if (isset($_GET["message1"])) {
    $key = $_GET["message1"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
        echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Success",
            text: "Successful Deleted",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
        $_SESSION["lack_of_intfund_$key"] = 0;
    }
} // If it is not successfull, It will show this message
else if (isset($_GET["message2"])) {
    $key = $_GET["message2"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
        echo '<script type="text/javascript">
  $(document).ready(function(){
      swal({
          type: "error",
          title: "Error",
          text: "Error during Registration",
          showConfirmButton: false,
          timer: 2000
      })
  });
  </script>
  ';
        $_SESSION["lack_of_intfund_$key"] = 0;
    }
}
if (isset($_GET["message3"])) {
    $key = $_GET["message3"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
        echo '<script type="text/javascript">
  $(document).ready(function(){
      swal({
          type: "success",
          title: "Success",
          text: "Chart of Account was Updated successfully!",
          showConfirmButton: false,
          timer: 2000
      })
  });
  </script>
  ';
        $_SESSION["lack_of_intfund_$key"] = 0;
    }
} else if (isset($_GET["message4"])) {
    $key = $_GET["message4"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
        echo '<script type="text/javascript">
$(document).ready(function(){
    swal({
        type: "error",
        title: "Error",
        text: "Error updating Chart of Account!",
        showConfirmButton: false,
        timer: 2000
    })
});
</script>
';
        $_SESSION["lack_of_intfund_$key"] = 0;
    }
} else if (isset($_GET["message5"])) {
    $key = $_GET["message5"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
        echo '<script type="text/javascript">
  $(document).ready(function(){
      swal({
          type: "error",
          title: "General Ledger Deleted",
          text: "GL account has been deleted successfully",
          showConfirmButton: false,
          timer: 2000
      })
  });
  </script>
  ';
        $_SESSION["lack_of_intfund_$key"] = 0;
    }
} else if (isset($_GET["message6"])) {
    $key = $_GET["message6"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
        echo '<script type="text/javascript">
  $(document).ready(function(){
      swal({
          type: "error",
          title: "Error",
          text: "Error Deleting GL account",
          showConfirmButton: false,
          timer: 2000
      })
  });
  </script>
  ';
        $_SESSION["lack_of_intfund_$key"] = 0;
    }
} else if (isset($_GET["message9"])) {
    $key = $_GET["message9"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
        echo '<script type="text/javascript">
  $(document).ready(function(){
      swal({
          type: "error",
          title: "GL Code Error",
          text: "GL Code Already Exsits",
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
<!-- Content added here -->
<!-- POST INTO -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sessint_id = $_SESSION['int_id'];
    $efd = $_POST['submit'];
    // on her i will be posting data
    if ($efd == "gl_accounto") {
        $acct_name = $_POST['acct_name'];
        $gl_code = $_POST['gl_code'];
        $acct_type = $_POST['acct_type'];
        $ext_id = $_POST['ext_id'];
        $acct_use = $_POST['acct_use'];
        $qed = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND gl_code = '$gl_code'");
        $dsp = mysqli_fetch_array($qed);
        $gll = $dsp['gl_code'];
        if ($gl_code == $gll) {
            echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
         type: "error",
          title: "Error",
            text: "GL Code Already Exist",
         showConfirmButton: false,
       timer: 2000
        })
        });
 </script>';
        } else {

            if (isset($_POST['man_ent'])) {
                $man_ent_all = 1;
            } else {
                $man_ent_all = 0;
            }

            $fdop = "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id' AND classification_enum = '$acct_type' AND parent_id = '0'";
            $fdos = mysqli_query($connection, $fdop);
            $pdfo = mysqli_num_rows($fdos);
            $int_id_no = $pdfo + 1;

            if (isset($_POST['bank_rec'])) {
                $bank_rec = 1;
            } else {
                $bank_rec = 0;
            }
            $desc = $_POST['desc'];
            $int_id = $sessint_id;
            $bnc_id = $branch_id;

            if (isset($_POST['parent_id'])) {
                $pid = $_POST['parent_id'];

                // alright check this out
                $chat_acct = "INSERT INTO `acc_gl_account`
  (`int_id`, `branch_id`, `name`, `parent_id`, `gl_code`,
  `manual_journal_entries_allowed`, `account_usage`, `classification_enum`, `description`, `reconciliation_enabled`)
  VALUES ('{$int_id}', '{$bnc_id}', '{$acct_name}',
  '{$pid}', '{$gl_code}',
  '{$man_ent_all}', '{$acct_use}', '{$acct_type}', '{$desc}', '{$bank_rec}')";

                $done = mysqli_query($connection, $chat_acct);

                if ($done) {
                    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
         type: "success",
          title: "CHART OF ACCOUNT",
            text: "Successfully Created",
         showConfirmButton: false,
       timer: 2000
        })
        });
 </script>';
                } else {
                    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
         type: "error",
          title: "CHART OF ACCOUNT",
            text: "Error in Creation",
         showConfirmButton: false,
       timer: 2000
        })
        });
 </script>';
                }
            } else {
                // alright check this out
                $chat_acct = "INSERT INTO `acc_gl_account`
  (`int_id`, `int_id_no`, `branch_id`, `name`, `gl_code`,
  `manual_journal_entries_allowed`, `account_usage`, `classification_enum`, `description`, `reconciliation_enabled`)
  VALUES ('{$int_id}', '{$int_id_no}', '{$bnc_id}', '{$acct_name}', '{$gl_code}',
  '{$man_ent_all}', '{$acct_use}', '{$acct_type}', '{$desc}', '{$bank_rec}')";

                $done = mysqli_query($connection, $chat_acct);

                if ($done) {
                    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
         type: "success",
          title: "CHART OF ACCOUNT",
            text: "Successfully Created",
         showConfirmButton: false,
       timer: 2000
        })
        });
 </script>';
                } else {
                    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
         type: "error",
          title: "CHART OF ACCOUNT",
            text: "Error in Creation",
         showConfirmButton: false,
       timer: 2000
        })
        });
 </script>';
                }
            }
        }
    } else {
        echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
         type: "info",
          title: "CHART OF ACCOUNT",
            text: "nothing added",
         showConfirmButton: false,
       timer: 2000
        })
        });
 </script>';
    }
}
?>
<!-- DONE POSTING -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Chart of Accounts</h4>
                        <!-- Insert number users institutions -->
                        <p class="card-category"><?php
                                                    $query = "SELECT * FROM acc_gl_account WHERE int_id = '$sessint_id'";
                                                    $result = mysqli_query($connection, $query);
                                                    if ($result) {
                                                        $inr = mysqli_num_rows($result);
                                                        echo $inr;
                                                    } ?> Chart of Accounts || <a style="color: white;" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">Add Account</a>
                        </p>
                        <!-- Insert number users institutions -->

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>GL No</th>
                                        <th>Account Name</th>
                                        <th>Account Type</th>
                                        <th>Balance</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                    <tr>
                                    <?php $row["id"]; ?>
                                        <td><?php echo $row["gl_code"]; ?></td>
                                        <?php
                                                // using the parent_id to sort them out
                                                $nameofacct = "";
                                                $rid = $row["id"];
                                                $nameid = strtoupper($row["name"]);
                                                $pid = $row["parent_id"];
                                                if ($pid == "" || $pid == NULL || $pid == 0) {
                                                    $nameofacct = "<b style='font-size: 21; color: black;'>" . $nameid . "</b>";
                                                } else {
                                                    $iman = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE id = '$pid' && int_id = '$sessint_id' ORDER BY acc_gl_account.classification_enum ASC");
                                                    $hmm = mysqli_fetch_array($iman);
                                                    $gen = strtoupper($hmm["name"]);
                                                    $nameofacct = "<b style='font-size: 21; color: black;'>" . $gen . "</b>" . " - " . $nameid;
                                                }

                                                ?>
                                        <td><?php echo $nameofacct; ?></td>
                                        <?php
                                                // get classification for account type using conditions
                                                $class = "";
                                                $row["classification_enum"];
                                                if ($row["classification_enum"] == 1 || $row["classification_enum"] == "1") {
                                                    $class = "ASSETS";
                                                } else if ($row["classification_enum"] == 2 || $row["classification_enum"] == "2") {
                                                    $class = "LIABILITY";
                                                } else if ($row["classification_enum"] == 3 || $row["classification_enum"] == "3") {
                                                    $class = "EQUITY";
                                                } else if ($row["classification_enum"] == 4 || $row["classification_enum"] == "4") {
                                                    $class = "INCOME";
                                                } else if ($row["classification_enum"] == 5 || $row["classification_enum"] == "5") {
                                                    $class = "EXPENSE";
                                                }
                                                ?>
                                        <td><?php echo $class; ?></td>
                                        <td><?php if ($row["organization_running_balance_derived"] < 0) {
                                                        echo '<div style="color: red;">' . number_format($row["organization_running_balance_derived"]) . '</div>';
                                                    } else {
                                                        echo number_format($row["organization_running_balance_derived"]);
                                                    } ?></td>
                                                    <?php
                                                $cash = $row["organization_running_balance_derived"];
                                                $intid = $row['int_id'];
                                                $gltype = $row["parent_id"];
                                                $glscde = $row['gl_code'];

                                                $df = "SELECT * FROM gl_account_transaction WHERE int_id= '$intid' AND gl_code='$glscde'";
                                                $fdi = mysqli_query($connection, $df);
                                                if (count([$fdi]) > 0) {
                                                    $dsd = "0";
                                                } else {
                                                    $dsd = "1";
                                                }
                                                if ($cash == 0 && $gltype != '0' && $dsd == 0) {
                                                    ?>
                                        <td><a href="delete_chart_account.php?edit=<?php echo $row["id"]; ?>"
                                                           class="btn btn-danger btn-fab btn-fab-mini btn-round"><i
                                                                    style="color:#ffffff;"
                                                                    class="material-icons">close</i></a></td>
                                                                    <td><a hidden><i style="color:#ffffff;" class="material-icons">create</i></a> </td>
                                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><a hidden><i style="color:#ffffff;" class="material-icons">create</i></a> </td>
                                        <td><a href="edit_chart_account.php?edit=<?php echo $row["id"]; ?>"
                                                       class="btn btn-info btn-fab btn-fab-mini btn-round"><i
                                                                style="color:#ffffff;" class="material-icons">create</i></td>
                                                                <?php
                                                }
                                                ?>
                                    </tr>
                                    <?php }
                                    } else {
                                        echo "0 Document";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>GL No</th>
                                        <th>Account Name</th>
                                        <th>Account Type</th>
                                        <th>Balance</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Chart of Account</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Account name*</label>
                                                                <input type="text" style="text-transform: uppercase;"
                                                                       class="form-control" name="acct_name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>External ID</label>
                                                                <input type="text" style="text-transform: uppercase;"
                                                                       class="form-control" name="ext_id">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Account Type*</label>
                                                                <select class="form-control" name="acct_type" id="give">
                                                                    <option value="">Select an option</option>
                                                                    <option value="1">ASSET</option>
                                                                    <option value="2">LIABILITY</option>
                                                                    <option value="3">EQUITY</option>
                                                                    <option value="4">INCOME</option>
                                                                    <option value="5">EXPENSE</option>
                                                                </select>
                                                                <input hidden type="text" id="int_id"
                                                                       value="<?php echo $sessint_id; ?>"
                                                                       style="text-transform: uppercase;"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $('#give').on("change", function () {
                                                                    var type = $(this).val();
                                                                    var dso = $('#atu').val();
                                                                    var pid = $('#dropping').val();
                                                                    $.ajax({
                                                                        url: "ajax_post/chart_account_gl.php",
                                                                        method: "POST",
                                                                        data: {type: type, dso: dso, pid: pid},
                                                                        success: function (data) {
                                                                            $('#tit').html(data);
                                                                        }
                                                                    })
                                                                });
                                                            });
                                                        </script>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $('#atu').on("change", function () {
                                                                    var dso = $(this).val();
                                                                    var type = $('#give').val();
                                                                    var pid = $('#dropping').val();
                                                                    $.ajax({
                                                                        url: "ajax_post/chart_account_gl.php",
                                                                        method: "POST",
                                                                        data: {type: type, dso: dso, pid: pid},
                                                                        success: function (data) {
                                                                            $('#tit').html(data);
                                                                        }
                                                                    })
                                                                });
                                                            });
                                                        </script>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $('#dropping').on("change", function () {
                                                                    var dso = $('#atu').val();
                                                                    var type = $('#give').val();
                                                                    var pid = $(this).val();
                                                                    $.ajax({
                                                                        url: "ajax_post/chart_account_gl.php",
                                                                        method: "POST",
                                                                        data: {type: type, dso: dso, pid: pid},
                                                                        success: function (data) {
                                                                            $('#tit').html(data);
                                                                        }
                                                                    })
                                                                });
                                                            });
                                                        </script>
                                                        <div class="col-md-6">
                                                            <div id="tit" class="form-group">
                                                                <label>GL Code*</label>
                                                                <input type="text" style="text-transform: uppercase;"
                                                                       class="form-control" value="" name="gl_code"
                                                                       required readonly>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                          <div class="form-group">
                                                            <label >Account Tag</label>
                                                            <select class="form-control" name="acct_tag" id="">
                                                              <option value="">Select an option</option>
                                                            </select>
                                                          </div>
                                                        </div> -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Account Usage</label>
                                                                <select id="atu" class="form-control" name="acct_use"
                                                                        required>
                                                                    <option value="">Select an option</option>
                                                                    <option value="1">GL ACCOUNT</option>
                                                                    <option value="2">GL GROUP</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $('#atu').change(function () {
                                                                    var gl = $(this).val();
                                                                    var ch = $('#give').val();
                                                                    var id = $('#int_id').val();
                                                                    $.ajax({
                                                                        url: "ajax_post/chart_acct_post.php",
                                                                        method: "POST",
                                                                        data: {gl: gl, ch: ch, id: id},
                                                                        success: function (data) {
                                                                            $('#dropping').html(data);
                                                                        }
                                                                    })
                                                                });
                                                                $('#give').change(function () {
                                                                    var ch = $(this).val();
                                                                    var gl = $('#atu').val();
                                                                    var id = $('#int_id').val();
                                                                    $.ajax({
                                                                        url: "ajax_post/chart_acct_post.php",
                                                                        method: "POST",
                                                                        data: {ch: ch, gl: gl, id: id},
                                                                        success: function (data) {
                                                                            $('#dropping').html(data);
                                                                        }
                                                                    })
                                                                });
                                                            });
                                                        </script>
                                                        <!-- checking out the group 2 -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div>
                                                                    <label>GL Group</label>
                                                                    <select id="dropping" class="form-control"
                                                                            name="parent_id">
                                                                        <option value="0">choose group</option>
                                                                        <?php echo fill_gl($connection) ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php function fill_gl($connection)
                                                        {
                                                            $sint_id = $_SESSION["int_id"];
                                                            $org = "SELECT * FROM acc_gl_account WHERE (int_id = '$sint_id' AND (parent_id = '' OR parent_id = '0'))";
                                                            $res = mysqli_query($connection, $org);
                                                            $out = '';
                                                            while ($row = mysqli_fetch_array($res)) {
                                                                $out .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                                            }
                                                            return $out;
                                                        } ?>
                                                        <!-- end of group  -->
                                                        <br>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Manual Entires Allowed</label><br/>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" name="man_ent"
                                                                               type="checkbox" value="1">
                                                                        <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Allow Bank reconciliation?</label><br/>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" name="bank_rec"
                                                                               type="checkbox" value="1">
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label> Description:</label>
                                                                <input type="text" style="text-transform: uppercase;"
                                                                       class="form-control" name="desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div style="float:right;">
                                                        <button type="submit" name="submit" value="gl_accounto"
                                                                class="btn btn-primary pull-right">Add
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </form>
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
        $('#example').DataTable();
    });
</script>

<?php

include("footer.php");

?>
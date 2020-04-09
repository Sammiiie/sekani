<?php

$page_title = "Deposit/ Withdrwal";
$destination = "index.php";
include("header.php");
?>
<?php
if (isset($_GET["message"])) {
    $key = $_GET["message"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Success",
            text: "Transaction Successful, Awaiting Approval",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
 }
} else if (isset($_GET["message2"])) {
    $key = $_GET["message2"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "error",
            title: "Error",
            text: "Transaction Error",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
  }
} else if (isset($_GET["message3"])) {
    $key = $_GET["message3"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Withdrawal",
            text: "Transaction Successful, Awaiting Approval",
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
            title: "Withdrawal Error",
            text: "Transaction Error",
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
            title: "Fund Error",
            text: "Insufficient Fund",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
 }
} else if (isset($_GET["message7"])) {
    $key = $_GET["message7"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "error",
            title: "Account Number Error",
            text: "Account Not Found",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
}
} else if (isset($_GET["message8"])) {
  $key = $_GET["message8"];
  // $out = $_SESSION["lack_of_intfund_$key"];
  $tt = 0;
if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
  echo '<script type="text/javascript">
  $(document).ready(function(){
      swal({
          type: "error",
          title: "Pick",
          text: "Select Transaction Type",
          showConfirmButton: false,
          timer: 2000
      })
  });
  </script>
  ';
  $_SESSION["lack_of_intfund_$key"] = 0;
}
} else {
    echo "";
}
?>
<?php
$digits = 6;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
$randms1= str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
$transid = $randms;
$transid1 = $randms1;
?>
<!-- Content added here -->
<div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title">Loan Repayment</h4>
                        <!-- <p class="card-category">Fill in all important data</p> -->
                      </div>
                      <div class="card-body">
                      <form method="post">
    <div class="row">
        <div class="col-md-4">
        <script>
              $(document).ready(function() {
                  $('#acct').on("change keyup paste click", function(){
                    var id = $(this).val();
                    var ist = $('#int_id').val();
                    $.ajax({
                      url:"acct_rep.php",
                      method:"POST",
                      data:{id:id, ist: ist},
                      success:function(data){
                        $('#accrep').html(data);
                      }
                    })
                  });
              });
        </script>
            <div class="form-group">
                <label for="">Account Number</label>
                <input type="text" class="form-control" name="account_no" id="acct">
                <input type="text" class="form-control" hidden name="" value="<?php echo $sessint_id;?>" id="int_id">
            </div>
        </div>
        <div id="accrep"></div>
    </div>    
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
  </form>
                      </div>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title">Deposit/Withdrawal</h4>
                        <!-- <p class="card-category">Fill in all important data</p> -->
                      </div>
                      <div class="card-body">
                      <form action="../functions/withdep.php" method="post">
    <div class="row">
        <div class="col-md-4">
            <script>
                $(document).ready(function() {
                  $('#act').on("change keyup paste click", function(){
                    var id = $(this).val();
                    var ist = $('#int_id').val();
                    $.ajax({
                      url:"acct_name.php",
                      method:"POST",
                      data:{id:id, ist: ist},
                      success:function(data){
                        $('#accname').html(data);
                      }
                    })
                  });
                });
              </script>
            <div class="form-group">
                <label for="">Type</label>
                <select class="form-control" name="test">
                    <option> </option>
                    <option value="deposit">Deposit</option>
                    <option value="withdraw">Withdraw</option>
                 </select>
            </div>
            <div id="acct_name"></div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
               <label class="bmd-label-floating">Account Number</label>
               <input type="text" class="form-control" name="account_no" id="act">
               <input type="text" class="form-control" hidden name="" value="<?php echo $sessint_id;?>" id="int_id">
            </div>
            <div id="accname"></div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
               <label class="bmd-label-floating">Amount</label>
               <input type="number" class="form-control" name="amount" value="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
               <select class="form-control" name="pay_type">
                  <option>Cash </option>
                  <option>Bank</option>
                  <option>Cheque</option>
               </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Transaction ID(Cheque no, Transfer Id, Deposit Id):</label>
                <input type="text" readonly value="<?php echo $transid1; ?>" name="transid" class="form-control" id="">
            </div>
          </div>
    </div>
    <button type="reset" class="btn btn-danger">Reset</button>
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
    <div class="clearfix"></div>
</form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
<?php
include("footer.php");
?>
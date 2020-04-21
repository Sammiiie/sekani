<?php

$page_title = "View teller";
$destination = "staff_mgmt.php";
    include("header.php");

?>
<!-- Content added here -->
    <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Teller Report</h4>
                  <!-- <p class="card-category">Fill in all important data</p> -->
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Start Date</label>
                          <input type="date" name="" class="form-control" id="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">End Date</label>
                          <input type="date" name="" class="form-control" id="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <!-- populate from db -->
                          <label class="bmd-label-floating">Branch</label>
                          <input type="text" name="" id="" class="form-control" readonly>
                        </div>
                      </div>
                      <div class=" col-md-4 form-group">
                          <!-- populate from db -->
                          <label for="bmd-label-floating">Teller ID</label>
                          <input type="text" name="" id="" class="form-control" readonly>
                      </div>
                      </div>
                      <button type="reset" class="btn btn-danger pull-left">Reset</button>
                    <button type="submit" class="btn btn-primary pull-right">Run Report</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <!-- teller report -->
            <!-- populate for print with above data -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Name of Institution</h4>
                  <p class="card-category">Teller call over report</p>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="">Name of Teller</label>
                            <input type="text" name="" id="" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="">Branch</label>
                            <input type="text" name="" id="" class="form-control" readonly>
                        </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">As at:</label>
                          <input type="text" name="" class="form-control" id="" readonly>
                        </div>
                      </div>
                      </div>
                    <div class="clearfix"></div>
                  </form>
                  <div class="table-responsive">
                  <!-- <script>
                  $(document).ready(function() {
                  $('#tabledat4').DataTable();
                  });
                  </script> -->
                    <table id="tabledat4" class="table" style="width: 100%;">
                      <thead class=" text-primary">
                      <?php
                        //$result = mysqli_query($connection, $query);
                      ?>
                        <!-- <th>
                          ID
                        </th> -->
                        <th>Account Name</th>
                        <th>
                          Opening Balance
                        </th>
                        <th>Deposit</th>
                        <th>
                          Withdrawal
                        </th>
                        <th>Balance</th>
                      </thead>
                      <tbody>
                      <?php //if (mysqli_num_rows($result) > 0) {
                        //while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
                        <tr>
                        <?php //$row["id"]; ?>
                          <th><?php //echo $row["name"]; ?></th>
                          <th><?php //echo $row["description"]; ?></th>
                          <th><?php //echo $row["short_name"]; ?></th>
                          <td></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th></th>
                            <th>total deposit</th>
                            <th>total withdrawal</th>
                            <th>total balance</th>
                        </tr>
                        <?php //}
                          //  // echo "0 Document";
                          //}
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- table ends here -->
                  <p><b>Opening Balance:</b> 129 </p>
                  <p><b>Total Deposit:</b> 129 </p>
                  <p><b>Total Withdrawal:</b> 129 </p>
                  <p><b>Closing Balance:</b> 129 </p>
                  <hr>
                  <p><b>Teller Sign:</b> 129                        <b>Date:</b></p>
                  <p><b>Checked By:</b>                             <b>Date/Sign:</b></p>
                </div>
              </div>
            </div>
          </div>
          <!-- /content -->
        </div>
      </div>

<?php

    include("footer.php");

?>
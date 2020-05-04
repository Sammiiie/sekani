
<?php
$page_title = "Edit Account";
$destination = "chart_account.php";
include("header.php");
?>
<!-- Content added here -->
<?php
// editing the chart account
if(isset($_GET["edit"])) {
  $id = $_GET["edit"];
  $update = true;
  $person = mysqli_query($connection, "SELECT * FROM acc_gl_account WHERE id='$id' && int_id='$sessint_id'");
// joke
  if (count([$person]) == 1) {
    $n = mysqli_fetch_array($person);
    $id = $n['id'];
    $acct_name = $n['name'];
    $gl_code = $n['gl_code'];
    $acct_type = $n['account_type'];
    $ext_id = $n['external_id'];
    $acct_tag = $n['tag_id'];
    $acct_use = $n['account_usage'];
    $des = $n['description'];
    $man_ent = $n['manual_journal_entries_allowed'];
    $disable_acct = $n['disabled'];
    $enb_bank_recon = $n['reconciliation_enabled'];
    $class_enum = $n['classification_enum'];
  }
  if($acct_use == 1){
    $acct_use_name = "GL ACCOUNT";
  }
  else if($acct_use == 2){
    $acct_use_name = "GL GROUP";
  }
}
?>
<div class="content">
    <div class="container-fluid">
      <!-- your content here -->
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit a General Ledger Account</h4>
              <p class="card-category">Fill in all important data</p>
            </div>
            <div class="card-body">
              <form action="../functions/update_chart_account.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >ID</label>
                      <input type="text" style="text-transform: uppercase;" class="form-control" readonly value="<?php echo $id; ?>" name="id">                  
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Account name</label>
                      <input type="text" value="<?php echo $acct_name; ?>" style="text-transform: uppercase;" class="form-control" name="acct_name" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >GL Code</label>
                      <input type="text" value="<?php echo $gl_code; ?>" style="text-transform: uppercase;" class="form-control" name="gl_code" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Account Type</label>
                      <select class="form-control" name="class_enum" id="" required>
                        <option value="<?php echo $class_enum?>"><?php echo $acct_type?></option>
                        <option value="1">ASSET</option>
                        <option value="2">LIABILITY</option>
                        <option value="3">EQUITY</option>
                        <option value="4">INCOME</option>
                        <option value="5">EXPENSE</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >External ID</label>
                      <input type="text" name="ext_id" value="<?php echo $ext_id; ?>" style="text-transform: uppercase;" class="form-control" required>
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Account Usage</label>
                      <select class="form-control" name="acct_use" id="" required>
                        <option value="<?php echo $acct_use;?>"><?php echo $acct_use_name;?></option>
                        <option value="1">GL ACCOUNT</option>
                        <option value="2">GL GROUP</option>
                      </select>                    
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Manual Entires Allowed</label><br/>
                      <div class="form-check form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="man_allow" type="checkbox" value="0">
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                      </label>
                    </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Disable</label><br/>
                      <div class="form-check form-check-inline">
                      <label class="form-check-label">
                          <input class="form-check-input" name="disable" type="checkbox" value="1">
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
                      <input type="text" name="descript" value="<?php echo $des; ?>" style="text-transform: uppercase;" class="form-control">  
                    </div>
                  </div>
                </div>
                <a href="client.php" class="btn btn-danger">Back</a>
                <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Update Account</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <!-- /form card -->
      </div>
      <!-- /content -->
    </div>
  </div>

<?php
include("footer.php");
?>
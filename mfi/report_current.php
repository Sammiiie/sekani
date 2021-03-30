<?php

$page_title = "Current Accounts report";
$destination = "reports.php";
    include("header.php");
    // include("../../functions/connect.php");

?>
<?php
//  Sweet alert Function

// If it is successfull, It will show this message
  if (isset($_GET["message1"])) {
    $key = $_GET["message1"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Registration Successful",
            text: "Awaiting Approval of New client",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = null;
}
// If it is not successfull, It will show this message
else if (isset($_GET["message2"])) {
  $key = $_GET["message2"];
  // $out = $_SESSION["lack_of_intfund_$key"];
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
  $_SESSION["lack_of_intfund_$key"] = null;
}
if (isset($_GET["message3"])) {
  $key = $_GET["message3"];
  // $out = $_SESSION["lack_of_intfund_$key"];
  echo '<script type="text/javascript">
  $(document).ready(function(){
      swal({
          type: "success",
          title: "Success",
          text: "Client was Updated successfully!",
          showConfirmButton: false,
          timer: 2000
      })
  });
  </script>
  ';
  $_SESSION["lack_of_intfund_$key"] = null;
}
else if (isset($_GET["message4"])) {
$key = $_GET["message4"];
// $out = $_SESSION["lack_of_intfund_$key"];
echo '<script type="text/javascript">
$(document).ready(function(){
    swal({
        type: "error",
        title: "Error",
        text: "Error updating client!",
        showConfirmButton: false,
        timer: 2000
    })
});
</script>
';
$_SESSION["lack_of_intfund_$key"] = null;
}
?>
<!-- Content added here -->
    <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Current Accounts Reports</h4>
                  
                  <!-- Insert number users institutions -->
                  <p class="card-category"><?php
                   $query = "SELECT * FROM reports WHERE category = 'current'";
                   $result = mysqli_query($connection, $query);
                   if ($result) {
                     $inr = mysqli_num_rows($result);
                     echo $inr;
                   }?> Current reports</p>
                </div>
                <div class="card-body">
                <div class="row">
                    <?php
                        $query = "SELECT * FROM reports WHERE category = 'current'";
                        $result = mysqli_query($connection, $query);
                      ?>
                       
                      <?php if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
                       
                    
                      <div class="col-md-4">
                        <div class="card card-pricing bg-primary">
                          <div class="card-body ">
                              <h4 class="card-title"><?php echo $row["name"]; ?></h4>
                              <p class="card-description">
                              <?php echo strtoupper($row["description"]); ?>
                              </p>
                              <a href="report_view.php?edit=<?php echo $row["id"];?>" class="btn btn-white btn-round">View</a>
                          </div>
                        </div>         
                     </div>
                        <?php }
                          }
                          else {
                            // echo "0 Document";
                          }
                          ?>
                                    
                      </div>

                  </div>
                </div>
                  <div class="table-responsive">
                  <table class="rtable display nowrap" style="width:100%">
                      
                      <tbody>
                      <?php if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
                        <tr>
                        <?php $row["id"]; ?>
                          <th><?php echo $row["name"]; ?></th>
                          <th><?php echo $row["category"]; ?></th>
                          <th><?php echo strtoupper($row["description"]); ?></th>
                          <td><a href="report_view.php?edit=<?php echo $row["id"];?>" class="btn btn-info"><i class="material-icons" style="margin: auto;">description</i></a></td>
                        </tr>
                        <?php }
                          }
                          else {
                            // echo "0 Document";
                          }
                          ?>
                          <!-- <th></th> -->
                    </table>
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
<?php
    session_start();
    if(!$_SESSION["usertype"] == "admin"){
      header("location: ../login.php");
      exit;
  }
?>

<?php
  // get connections for all pages
  include("../functions/connect.php");
  $sessint_id = $_SESSION["int_id"];
  $inq = mysqli_query($connection, "SELECT * FROM institutions WHERE int_id='$sessint_id'");
    if (count([$inq]) == 1) {
      $n = mysqli_fetch_array($inq);
      $int_name = $n['int_name'];
    }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Sekani - <?php echo $int_name?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <!-- <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div> -->
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <i class="material-icons">person</i>
              <p>Staff</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="client.php">
              <p>Client</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lend.php">
              <p>Lend</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="loans.php">
              <p>Loans</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="branch.php">
              <p>Branch</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">
              <i class="material-icons">bubble_chart</i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accounting.php">
              <p>Accounting</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="config.php">
              <p>Configuration</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <!-- <a class="navbar-brand" href="#pablo">Dashboard</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">notifications</i> Notifications
                </a>
              </li>
              <!-- user setup -->
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../functions/logout.php">Log out</a>
                </div>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
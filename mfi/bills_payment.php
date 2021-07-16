<?php

$page_title = "Bills Payment";
$destination = "";
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
                        <h4 class="card-title">Bills Payment</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-tabs card-header-primary">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">

                                            <ul class="nav nav-tabs" data-tabs="tabs">

                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#cash" data-toggle="tab">
                                                        <!-- visibility -->
                                                        Cash
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#account" data-toggle="tab">
                                                        Account
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="cash">
                                            <div class="row">
                                                <div class="col-md-4 ml-auto mr-auto">
                                                    <div class="card card-pricing bg-primary">
                                                        <div class="card-body">

                                                            <form id="form" action="" method="POST">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating" style="color: white;">Select Biller</label>
                                                                                <select name="" id="disco" class="form-control" style="text-transform:uppercase; color: white;">
                                                                                    <option value="" style="color: black;">Billers</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating" style="color: white;">ID</label>
                                                                                <input type="number" id="id" class="form-control" name="" style="color: white;" />
                                                                            </div>
                                                                            <p>Customer Details </p>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating" style="color: white;">Amount</label>
                                                                                <input type="number" id="meter_no" class="form-control" name="" style="color: white;" />
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <a class="btn btn-white btn-round pull-right" id="process" data-toggle="modal" data-target="#exampleModalLabel1" style="color:black;">Proceed</a>
                                                                <div class="result">

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModalLabel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Transaction Details</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h5 style="color: black;">Customer Details: </h5>
                                                                                    <h5 style="color: black;">Token: </h5>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-primary">Download PDF</button>
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
                                        <div class="tab-pane" id="account">
                                            <div class="row">
                                                <div class="col-md-4 ml-auto mr-auto">
                                                    <div class="card card-pricing bg-primary">
                                                        <div class="card-body">

                                                            <form id="form" action="" method="POST">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating" style="color: white;">Select Biller</label>
                                                                                <select name="" id="disco" class="form-control" style="text-transform:uppercase; color: white;">
                                                                                    <option value="" style="color: black;">Billers</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating" style="color: white;">Account Number</label>
                                                                                <input type="number" id="id" class="form-control" name="" style="color: white;" />
                                                                                <p>Customer Details </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating" style="color: white;">ID</label>
                                                                                <input type="number" id="id" class="form-control" name="" style="color: white;" />
                                                                            </div>
                                                                            <p>Customer Details</p>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating" style="color: white;">Amount</label>
                                                                                <input type="number" id="meter_no" class="form-control" name="" style="color: white;" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="result">

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Transaction Details</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <h5 style="color: black;">Customer Details: </h5>
                                                                                            <h5 style="color: black;">Token: </h5>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            <button type="button" class="btn btn-primary">Download PDF</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <a class="btn btn-white btn-round pull-right" id="process" data-toggle="modal" data-target="#exampleModal" style="color:black;">Proceed</a>

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
            </div>
        </div>



    </div>
</div>


<?php

include("footer.php");

?>
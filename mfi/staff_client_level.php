<?php

$page_title = "Configuration";
$destination = "index.php";
include("header.php");
?>
<!-- Content added here -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->

        <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
                <div class="card card-pricing bg-primary">
                    <div class="card-body ">

                        <h4 class="card-title">Staff Level</h4>
                        <p class="card-description">
                            Create, Edit and Add Staff Levels
                        </p>
                        <a href="staff_level.php" class="btn btn-white btn-round">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ml-auto mr-auto">
                <div class="card card-pricing bg-primary">
                    <div class="card-body ">

                        <h4 class="card-title">Client Level</h4>
                        <p class="card-description">
                            Create, Edit and Add Client Level
                        </p>
                        <a href="client_class.php" class="btn btn-white btn-round">View</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include("footer.php")
?>
<?php

$page_title = "Staff Level";
$destination = "";
include("header.php");
?>

<!-- Content added here -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title text-center">Staff Level</h4>
                <p class="card-category text-center"></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Staff Level Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Staff Level Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Description">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Staff Level</button>
                        </form>
                    </div>
                    <div class="col-md-12 mt-4">
                        <table class="table table-striped table-bordered rtable display nowrap" style="width:100%">
                            <thead class=" text-primary">
                                <th>Staff Level Name</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="staff_level_view.php"><button type="button" class="btn btn-info">View</button></a> </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include("footer.php");

?>
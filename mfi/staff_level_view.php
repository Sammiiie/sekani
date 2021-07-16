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
                <h4 class="card-title text-center">Staff Level View</h4>
                <p class="card-category text-center"></p>
            </div>
            <div class="card-body">
            <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="">Classes</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">CLASSES</option>
                                    </select>
                                </div>
                             
                            </div>
                            <button type="submit" class="btn btn-primary">Add Occupation</button>
                        </form>
                    </div>
                    <div class="col-md-12 mt-4">
                        <table class="table table-striped table-bordered rtable display nowrap" style="width:100%">
                            <thead class=" text-primary">
                                <th>Classes</th>
                                <th>Created By</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">cancel</i>
                                    </button>

                                </td>
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
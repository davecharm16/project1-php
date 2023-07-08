<?php
    $currentPage = "trainings_category";
    $currentTree = "";
    include("inc/header.php");
    $traincat_id = $_GET['a'];
    $qry = mysqli_query($con,"SELECT * FROM trainings_category WHERE id = '$traincat_id'");
    $row = mysqli_fetch_array($qry);
    $category_name = $row['category_name'];
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Training Category</h1>
        <ol class="breadcrumb">
            <li><a href="trainings_category.php"><i class="fa fa-briefcase"></i> Trainings Category Management</a></li>
            <li class="active">Edit Training Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Messages  -->
        <div class="row">
            <div class="col-sm-4">
            <?php
                if (isset($_GET['s'])) {
                    $s = $_GET['s'];
                    if ($s == md5(0)) {
                        echo "
                            <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Exists!</h4>
                                Entry already exists.
                            </div>
                        "; 
                    }
                    elseif ($s == md5(1)) {
                        echo "
                            <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Added!</h4>
                                Successfully added.
                            </div>
                        "; 
                    }
                    elseif ($s == md5(2)) {
                        echo "
                            <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Updated!</h4>
                                Successfully updated.
                            </div>
                        "; 
                    }
                    elseif ($s == md5(3)) {
                        echo "
                            <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Deleted!</h4>
                                Successfully deleted.
                            </div>
                        "; 
                    }
                    elseif ($s == md5(4)) {
                        echo "
                            <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Error!</h4>
                                An error occured.
                            </div>
                        "; 
                    }
                }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8">
                        <form method="POST" action="trainings_category_edit_details.php?id=<?php echo $traincat_id ?>">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" name="category_name" id="category_name" class="form-control form-control-sm" value="<?php echo $category_name; ?>" placeholder="Categpry Name" required>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-success btn-flat" value="SAVE" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

<?php include("inc/footer.php"); ?>
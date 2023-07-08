<?php
    $currentPage = "projects";
    $currentTree = "";
    include("inc/header.php");
    $project_id = $_GET['a'];
    $qry = mysqli_query($con,"SELECT * FROM projects WHERE id = '$project_id'");
    $row = mysqli_fetch_array($qry);
    $project_name = $row['name'];
    $project_description = $row['description'];
    $fimage = $row['fimage'];
    $status = $row['status'];
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Project</h1>
        <ol class="breadcrumb">
            <li><a href="projects.php"><i class="fa fa-home"></i> Livelihood Projects</a></li>
            <li class="active">Edit Project</li>
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
                    <div class="col-sm-4 text-center">
                        <img src="<?php echo $fimage ?>" class="img-bordered" width="100%" alt="Featured Picture" /><br><br>
                        <form method="POST" action="projects_edit_image.php?id=<?php echo $project_id ?>" enctype="multipart/form-data">
                            <input type="file" name="picture" required/><br>
                            <input type="submit" name="submit" class="btn btn-success btn-flat btn-sm" value="SAVE" style="width: 50%" />
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <form method="POST" action="projects_edit_details.php?id=<?php echo $project_id ?>&username=<?php echo $username ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" name="project_name" value="<?php echo $project_name ?>" placeholder="Project Name" autofocus required /><br>
                                    <label>Project Description</label>
                                    <textarea class="textarea" name="project_description" placeholder="Project Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo "$project_description"; ?></textarea><br>
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="show" <?php if ($status == 'show') { echo "selected"; } ?>>SHOW</option>
                                        <option value="hide" <?php if ($status == 'hide') { echo "selected"; } ?>>HIDE</option>
                                    </select>
                                </div>
                            </div><br>
                            <input type="submit" name="submit" class="btn btn-success btn-flat" value="SAVE" style="width: 100%" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

<?php include("inc/footer.php"); ?>
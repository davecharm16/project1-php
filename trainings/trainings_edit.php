<?php
    $currentPage = "trainings";
    $currentTree = "";
    include("inc/header.php");
    $training_id = $_GET['a'];
    $qry = mysqli_query($con,"SELECT * FROM trainings WHERE id = '$training_id'");
    $row = mysqli_fetch_array($qry);
    $training_name = $row['name'];
    $training_description = $row['description'];
    $training_date = $row['training_date'];
    $fimage = $row['fimage'];
    $status = $row['status'];
    $trainDate = date("Y-m-d", strtotime($training_date));

    $training_category = $row['category'];
    $splitTrainingCat = explode(",",$training_category);
    $training_category1 = "'" . implode("', '", $splitTrainingCat) ."'";

    $training_skills = $row['skills'];
    $splitTrainingSkill = explode(",",$training_skills);
    $training_skills1 = "'" . implode("', '", $splitTrainingSkill) ."'";
    // echo "$training_category1";
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Training</h1>
        <ol class="breadcrumb">
            <li><a href="trainings.php"><i class="fa fa-gears"></i> Trainings</a></li>
            <li class="active">Edit Training</li>
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
                        <form method="POST" action="trainings_edit_image.php?id=<?php echo $training_id ?>" enctype="multipart/form-data">
                            <input type="file" name="picture" required/><br>
                            <input type="submit" name="submit" class="btn btn-success btn-flat btn-sm" value="SAVE" style="width: 50%" />
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <form method="POST" action="trainings_edit_details.php?id=<?php echo $training_id ?>&username=<?php echo $username ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Training Name</label>
                                    <input type="text" class="form-control" name="training_name" value="<?php echo $training_name ?>" placeholder="Training Name" autofocus required /><br>
                                    <label>Training Description</label>
                                    <textarea class="textarea" name="training_description" placeholder="Training Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo "$training_description"; ?></textarea>
                                    <div class="form-group">
                                        <label>Training Category (You can select multiple categories.)</label>
                                        <select class="form-control select2" name="training_category[]" id="training_category" multiple="multiple" style="width: 100%;" data-placeholder="Select Category" required>
                                            <?php
                                                $qry4 = mysqli_query($con,"SELECT * FROM trainings_category ORDER BY category_name ASC");
                                                while ($row4 = mysqli_fetch_array($qry4)) {
                                                    $category_name = $row4['category_name'];
                                            ?>
                                            <option value="<?php echo $category_name; ?>"><?php echo "$category_name"; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Skill Offered</label>
                                        <select class="form-control select2" name="training_skills[]" id="training_skills" multiple="multiple" style="width: 100%;" data-placeholder="Select Skills" required>
                                            <option value="Communication and interpersonal Skills">Communication and interpersonal Skills</option>
                                            <option value="Social Skills">Social Skills</option>
                                            <option value="Teamwork">Teamwork</option>
                                            <option value="Time management">Time management</option>
                                            <option value="Leadership skills">Leadership skills</option>
                                            <option value="Problem solving skills">Problem solving skills</option>
                                            <option value="Planning and Organizational skills">Planning and Organizational skills</option>
                                            <option value="Ability to learn and adopt">Ability to learn and adopt</option>
                                            <option value="Technology skills">Technology skills</option>
                                            <option value="Working under pressure and to deadlines">Working under pressure and to deadlines</option>
                                        </select>
                                    </div>
                                    <label>Training Date: <?php echo "$training_date"; ?></label>
                                    <input type="date" class="form-control" name="training_date" value="<?php echo $trainDate ?>" required /><br>
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="open" <?php if ($status == 'open') { echo "selected"; } ?>>Open</option>
                                        <option value="ongoing" <?php if ($status == 'ongoing') { echo "selected"; } ?>>On Going</option>
                                        <option value="closed" <?php if ($status == 'closed') { echo "selected"; } ?>>Closed</option>
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

<script>
    $(function(){
        $('#training_category').val([<?php echo "$training_category1"; ?>]).trigger('change');
        $('#training_skills').val([<?php echo "$training_skills1"; ?>]).trigger('change');
    });
</script>
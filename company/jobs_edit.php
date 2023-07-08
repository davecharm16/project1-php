<?php
    $currentPage = "jobs";
    $currentTree = "";
    include("inc/header.php");
    $job_id = $_GET['a'];
    $qry = mysqli_query($con,"SELECT * FROM jobs WHERE id = '$job_id'");
    $row = mysqli_fetch_array($qry);
    $job_name = $row['name'];
    $job_description = $row['description'];
    $company = $row['company_id'];
    $fimage = $row['fimage'];
    $status = $row['status'];

    $job_category = $row['category'];
    $splitJobCat = explode(",",$job_category);
    $job_category1 = "'" . implode("', '", $splitJobCat) ."'";

    $personal_domain = $row['domain'];
    $splitPersonalDom = explode(",",$personal_domain);
    $personal_domain1 = "'" . implode("', '", $splitPersonalDom) ."'";

    $skills = $row['skills'];
    $splitSkills = explode(",",$skills);
    $skills1 = "'" . implode("', '", $splitSkills) ."'";

    $education = $row['education'];
    $splitEducation = explode(",",$education);
    $education1 = "'" . implode("', '", $splitEducation) ."'";

    $personality = $row['personality'];
    $splitPersonality = explode(",",$personality);
    $personality1 = "'" . implode("', '", $splitPersonality) ."'";
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Job</h1>
        <ol class="breadcrumb">
            <li><a href="jobs.php"><i class="fa fa-briefcase"></i> Jobs</a></li>
            <li class="active">Edit Job</li>
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
                        <form method="POST" action="jobs_edit_image.php?id=<?php echo $job_id ?>" enctype="multipart/form-data">
                            <input type="file" name="picture" required/><br>
                            <input type="submit" name="submit" class="btn btn-success btn-flat btn-sm" value="SAVE" style="width: 50%" />
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <form method="POST" action="jobs_edit_details.php?id=<?php echo $job_id ?>&username=<?php echo $username ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Job Name</label>
                                    <input type="text" class="form-control" name="job_name" value="<?php echo $job_name ?>" placeholder="Job Name" autofocus required /><br>
                                    <label>Job Description</label>
                                    <textarea class="textarea" name="job_description" placeholder="Job Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo "$job_description"; ?></textarea>
                                    <div class="form-group">
                                        <label>Preferred Educational Qualification</label>
                                        <select class="form-control select2" name="education[]" id="education" multiple="multiple" style="width: 100%;" data-placeholder="Select Preferred Educational Qualification" required>
                                            <option value="ALS">ALS</option>
                                            <option value="Elementary undergraduate">Elementary undergraduate</option>
                                            <option value="Elementary graduate">Elementary graduate</option>
                                            <option value="High school undergraduate">High school undergraduate</option>
                                            <option value="High school graduate">High school graduate</option>
                                            <option value="College undergraduate">College undergraduate</option>
                                            <option value="College graduate">College graduate</option>
                                            <option value="Post graduate">Post graduate</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Job Category (You can select multiple categories.)</label>
                                        <select class="form-control select2" name="job_category[]" id="job_category" multiple="multiple" style="width: 100%;" data-placeholder="Select Category" required>
                                            <?php
                                                $qry4 = mysqli_query($con,"SELECT * FROM jobs_category ORDER BY category_name ASC");
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
                                        <label>Skill Preferred</label>
                                        <select class="form-control select2" name="skills[]" id="skills" multiple="multiple" style="width: 100%;" data-placeholder="Select Skills" required>
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
                                    <div class="form-group">
                                        <label>Personality Domain (You can select multiple domain.)</label>
                                        <select class="form-control select2" name="personal_domain[]" id="personal_domain" multiple="multiple" style="width: 100%;" data-placeholder="Select Domain" required>
                                            <option value="Extroversion">Extroversion</option>
                                            <option value="Agreeableness">Agreeableness</option>
                                            <option value="Conscientiousness">Conscientiousness</option>
                                            <option value="Emotional Stability">Emotional Stability</option>
                                            <option value="Openness">Openness</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Personality (You can select multiple domain.)</label>
                                        <select class="form-control select2" name="personality[]" id="personality" multiple="multiple" style="width: 100%;" data-placeholder="Select Domain" required>
                                            <option value="A">good team player</option>
                                            <option value="B">creative</option>
                                            <option value="C">resourceful</option>
                                            <option value="D">volunteering</option>
                                            <option value="E">willingness to upskill and enjoy challenge</option>
                                            <option value="F">entrepreneurial spirit</option>
                                            <option value="G">keen learner and committed to practice</option>
                                            <option value="H">intelligence, focus and concentration skills</option>
                                            <option value="I">hands-on</option>
                                            <option value="J">good problem-solver</option>
                                            <option value="K">self-motived</option>
                                            <option value="L">good communication skills</option>
                                            <option value="M">open and well-rounded individual with a holistic outlook</option>
                                            <option value="N">thoughtful, kind and considerate individual</option>
                                        </select>
                                    </div>
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="show" <?php if ($status == 'show') { echo "selected"; } ?>>SHOW</option>
                                        <option value="hide" <?php if ($status == 'hide') { echo "selected"; } ?>>HIDE</option>
                                    </select>
                                </div>
                            </div><br>
                            <input type="hidden" name="company" id="company" value="<?php echo $company; ?>">
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
        $('#job_category').val([<?php echo "$job_category1"; ?>]).trigger('change');
        $('#personal_domain').val([<?php echo "$personal_domain1"; ?>]).trigger('change');
        $('#skills').val([<?php echo "$skills1"; ?>]).trigger('change');
        $('#education').val([<?php echo "$education1"; ?>]).trigger('change');
        $('#personality').val([<?php echo "$personality1"; ?>]).trigger('change');
    });
</script>
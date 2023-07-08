<?php
    $currentPage = "info";
    $currentTree = "";
    include("inc/header.php");
    $qry = mysqli_query($con,"SELECT * FROM eda WHERE eda_id = '$username'");
    $row = mysqli_fetch_array($qry);
    // $fullname = $row['fullname'];
    // $age = $row['age'];
    // $gender = $row['gender'];
    // $civil_status = $row['civil_status'];
    // $educational_attainment = $row['educational_attainment'];
    // $work_status = $row['work_status'];
    // $seminar_attended = $row['seminar_attended'];
    // $drug_type = $row['drug_type'];
    // $rehab_no = $row['rehab_no'];

    $lastname = $row['lastname'];
    $firstname = $row['firstname'];
    $middlename = $row['middlename'];
    $birthdate = $row['birthdate'];
    $gender = $row['gender'];
    $address = $row['address'];
    $contact_no = $row['contact_no'];
    $email_address = $row['email_address'];
    $education = $row['education'];
    $previous_job = $row['previous_job'];
    $skills = $row['skills'];
    $trainings_attended = $row['trainings_attended'];
    $drug_type = $row['drug_type'];
    $four_p = $row['four_p'];
    $referral = $row['referral'];
    $picture = $row['picture'];

    $skill_list = explode(',', $skills);
    $drug_list = explode(',', $drug_type);
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>My Profile</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-info-circle"></i> My Profile</li>
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
        <!-- /Messages -->

        <div class="row">
            <div class="col-sm-12">
            <div class="box box-success">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        <div class="row">
                            <div class="col-sm-4 text-center col-xs-offset-4">
                                <?php
                                    if ($picture == '') $picture = "../assets/profile.jpg";
                                ?>
                                <img src="<?php echo $picture ?>" class="img-circle img-bordered" width="50%" alt="Profile Picture" /><br><br>
                                <form method="POST" action="profile_edit_image.php?id=<?php echo $username ?>" enctype="multipart/form-data">
                                    <label for="picture">Please upload your latest picture</label>
                                    <input type="file" name="picture" required/><br>
                                    <input type="submit" name="submit" class="btn btn-success btn-flat btn-sm" value="SAVE" style="width: 50%" />
                                </form>
                            </div>
                        </div>
                        <form action="info_edit.php?id=<?php echo $username; ?>" method="POST">
                            <div style="padding: 10px 30px 10px 30px">
                                <legend>I. IDENTIFYING INFORMATION</legend>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="<?php echo $lastname; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="<?php echo $firstname; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middle Name" value="<?php echo $middlename; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="birthdate">Date of Birth</label>
                                            <input type="date" name="birthdate" id="birthdate" value="<?php echo $birthdate; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="contact_no">Contact No.</label>
                                            <input type="text" name="contact_no" id="contact_no" value="<?php echo $contact_no; ?>" class="form-control" placeholder="Contact No." required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email_address">Email Address</label>
                                            <input type="text" name="email_address" id="email_address" value="<?php echo $email_address; ?>" class="form-control" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" id="gender1" value="MALE" required <?php if ($gender == 'MALE') echo "checked"; ?>>
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" id="gender1" value="FEMALE" required <?php if ($gender == 'FEMALE') echo "checked"; ?>>
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" value="<?php echo $address; ?>" class="form-control" placeholder="House No./Street Name/Bldg. No., Barangay, Municipality/City, Province" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="education">What is your educational qualification?</label>
                                            <div class="radio">
                                                <label><input type="radio" name="education" id="radio" value="ALS" <?php if ($education == 'ALS') { echo "checked"; } ?> required>ALS</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="education" id="radio" value="Elementary undergraduate" <?php if ($education == 'Elementary undergraduate') { echo "checked"; } ?> required>Elementary undergraduate</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="education" id="radio" value="Elementary graduate" <?php if ($education == 'Elementary graduate') { echo "checked"; } ?> required>Elementary graduate</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="education" id="radio" value="High school undergraduate" <?php if ($education == 'High school undergraduate') { echo "checked"; } ?> required>High school undergraduate</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="education" id="radio" value="High school graduate" <?php if ($education == 'High school graduate') { echo "checked"; } ?> required>High school graduate</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="education" id="radio" value="College undergraduate" <?php if ($education == 'College undergraduate') { echo "checked"; } ?> required>College undergraduate</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="education" id="radio" value="College graduate" <?php if ($education == 'College graduate') { echo "checked"; } ?> required>College graduate</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="education" id="radio" value="Post graduate" <?php if ($education == 'Post graduate') { echo "checked"; } ?> required>Post graduate</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="previous_job">What is your previous job classification?</label>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Managers, Professionals" <?php if ($previous_job == 'Managers, Professionals') { echo "checked"; } ?> required>Managers, Professionals</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Technicians and associate professionals" <?php if ($previous_job == 'Technicians and associate professionals') { echo "checked"; } ?> required>Technicians and associate professionals</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Clerical support workers" <?php if ($previous_job == 'Clerical support workers') { echo "checked"; } ?> required>Clerical support workers</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Service and sales workers" <?php if ($previous_job == 'Service and sales workers') { echo "checked"; } ?> required>Service and sales workers</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Skilled agricultural" <?php if ($previous_job == 'Skilled agricultural') { echo "checked"; } ?> required>Skilled agricultural</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="forestry and fishery workers" <?php if ($previous_job == 'forestry and fishery workers') { echo "checked"; } ?> required>forestry and fishery workers</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Craft and related trades workers" <?php if ($previous_job == 'Craft and related trades workers') { echo "checked"; } ?> required>Craft and related trades workers</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Plant and machine operators and assemblers" <?php if ($previous_job == 'Plant and machine operators and assemblers') { echo "checked"; } ?> required>Plant and machine operators and assemblers</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Elementary occupations" <?php if ($previous_job == 'Elementary occupations') { echo "checked"; } ?> required>Elementary occupations</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="previous_job" id="radio" value="Armed forces occupations" <?php if ($previous_job == 'Armed forces occupations') { echo "checked"; } ?> required>Armed forces occupations</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="skills">What are your skills?</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Communication and interpersonal Skills" <?php if (in_array("Communication and interpersonal Skills",$skill_list)) { echo "checked"; } ?>>
                                                    Communication and interpersonal Skills
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Social Skills" <?php if (in_array("Social Skills",$skill_list)) { echo "checked"; } ?>>
                                                    Social Skills
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Teamwork" <?php if (in_array("Teamwork",$skill_list)) { echo "checked"; } ?>>
                                                    Teamwork
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Time management" <?php if (in_array("Time management",$skill_list)) { echo "checked"; } ?>>
                                                    Time management
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Leadership skills" <?php if (in_array("Leadership skills",$skill_list)) { echo "checked"; } ?>>
                                                    Leadership skills
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Problem solving skills" <?php if (in_array("Problem solving skills",$skill_list)) { echo "checked"; } ?>>
                                                    Problem solving skills
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Planning and Organizational skills" <?php if (in_array("Planning and Organizational skills",$skill_list)) { echo "checked"; } ?>>
                                                    Planning and Organizational skills
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Ability to learn and adopt" <?php if (in_array("Ability to learn and adopt",$skill_list)) { echo "checked"; } ?>>
                                                    Ability to learn and adopt
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Technology skills" <?php if (in_array("Technology skills",$skill_list)) { echo "checked"; } ?>>
                                                    Technology skills
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="skill_list[]" id="skill_list" value="Working under pressure and to deadlines" <?php if (in_array("Working under pressure and to deadlines",$skill_list)) { echo "checked"; } ?>>
                                                    Working under pressure and to deadlines
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="trainings_attended">How many training you have attended?</label>
                                            <div class="radio">
                                                <label><input type="radio" name="trainings_attended" id="radio" value="None" <?php if ($trainings_attended == 'None') { echo "checked"; } ?> required>None</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="trainings_attended" id="radio" value="1-2" <?php if ($trainings_attended == '1-2') { echo "checked"; } ?> required>1-2</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="trainings_attended" id="radio" value="3-4" <?php if ($trainings_attended == '3-4') { echo "checked"; } ?> required>3-4</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="trainings_attended" id="radio" value="5 and above" <?php if ($trainings_attended == '5 and above') { echo "checked"; } ?> required>5 and above</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="drug_type">What type of drugs you used? (Select all that applies)</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="drug_list[]" id="drug_list" value="Amphetamines" <?php if (in_array("Amphetamines",$drug_list)) { echo "checked"; } ?>>
                                                    Amphetamines
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="drug_list[]" id="drug_list" value="Cannabis (Marijuana)" <?php if (in_array("Cannabis (Marijuana)",$drug_list)) { echo "checked"; } ?>>
                                                    Cannabis (Marijuana)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="drug_list[]" id="drug_list" value="Ecstasy" <?php if (in_array("Ecstasy",$drug_list)) { echo "checked"; } ?>>
                                                    Ecstasy
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="drug_list[]" id="drug_list" value="Cocaine" <?php if (in_array("Cocaine",$drug_list)) { echo "checked"; } ?>>
                                                    Cocaine
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="drug_list[]" id="drug_list" value="Methamphetamine (Shabu)" <?php if (in_array("Methamphetamine (Shabu)",$drug_list)) { echo "checked"; } ?>>
                                                    Methamphetamine (Shabu)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="four_p">Are you a member of 4’s or in the “listahan” of DSWD?</label>
                                            <div class="radio">
                                                <label><input type="radio" name="four_p" id="radio" value="Yes" <?php if ($four_p == 'Yes') { echo "checked"; } ?> required>Yes</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="four_p" id="radio" value="No" <?php if ($four_p == 'No') { echo "checked"; } ?> required>No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="referral">Do you have referrals from the Rehabilitation center?</label>
                                            <div class="radio">
                                                <label><input type="radio" name="referral" id="radio" value="Yes" <?php if ($referral == 'Yes') { echo "checked"; } ?> required>Yes</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="referral" id="radio" value="No" <?php if ($referral == 'No') { echo "checked"; } ?> required>No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="submit" id="submit" class="btn btn-success btn-flat pull-right" value="Update">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                    <!-- <div class="box-footer"></div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

<?php include("inc/footer.php"); ?>

<script>
    $(function(){
        $('#submit').click(function() {
            checked = $("input[id=skill_list]:checked").length;
            checked2 = $("input[id=drug_list]:checked").length;
            if(!checked || !checked2) {
                alert("You must check at least one checkbox.");
                return false;
            }

        });
    });
</script>
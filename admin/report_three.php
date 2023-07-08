<?php
    $currentPage = "report_three";
    $currentTree = "";
    include("inc/header.php");

    $age = "";
    $gender = "";
    $previous_job = "";
    $education = "";
    $skills = "";
    $trainings_attended = "";
    $drug_type = "";
    $referral = "";
    $four_p = "";

    if (isset($_POST['btnGo'])) {
        $gender = sanitizedString($con,$_POST['gender']);
        $education = sanitizedString($con,$_POST['education']);
        $previous_job = sanitizedString($con,$_POST['previous_job']);
        $skills = sanitizedString($con,$_POST['skills']);
        $trainings_attended = sanitizedString($con,$_POST['trainings_attended']);
        $drug_type = sanitizedString($con,$_POST['drug_type']);
        $referral = sanitizedString($con,$_POST['referral']);
        $four_p = sanitizedString($con,$_POST['four_p']);
    }
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Advance Search</h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-search"></i> Advance Search</li>
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
                <div class="box box-success">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <form method="POST">
                                <!-- <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <select name="age" id="age" class="form-control">
                                            <option value="">-- Select Age --</option>
                                            <option value="age >= 18 AND age <= 23" <?php if ($age == "age >= 18 AND age <= 23") echo "selected"; ?>>18 yrs. old to 23 yrs. old</option>
                                            <option value="age >= 24 AND age <= 29" <?php if ($age == "age >= 24 AND age <= 29") echo "selected"; ?>>24 yrs. old to 29 yrs. old</option>
                                            <option value="age >= 30 AND age <= 35" <?php if ($age == "age >= 30 AND age <= 35") echo "selected"; ?>>30 yrs. old to 35 yrs. old</option>
                                            <option value="age >= 36 AND age <= 41" <?php if ($age == "age >= 36 AND age <= 41") echo "selected"; ?>>36 yrs. old to 41 yrs. old</option>
                                            <option value="age > 41" <?php if ($age == 'age > 41') echo "selected"; ?>>41 yrs. old and above</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">-- Select Gender --</option>
                                            <option value="MALE" <?php if ($gender == 'MALE') echo "selected"; ?>>Male</option>
                                            <option value="FEMALE" <?php if ($gender == 'FEMALE') echo "selected"; ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="education">Educational Attainment</label>
                                        <select name="education" id="education" class="form-control">
                                            <option value="">-- Select Educational Attainment --</option>
                                            <option value="ALS" <?php if ($education == 'ALS') echo "selected"; ?>>ALS</option>
                                            <option value="Elementary undergraduate" <?php if ($education == 'Elementary undergraduate') echo "selected"; ?>>Elementary undergraduate</option>
                                            <option value="Elementary graduate" <?php if ($education == 'Elementary graduate') echo "selected"; ?>>Elementary graduate</option>
                                            <option value="High school undergraduate" <?php if ($education == 'High school undergraduate') echo "selected"; ?>>High school undergraduate</option>
                                            <option value="High school graduate" <?php if ($education == 'High school graduate') echo "selected"; ?>>High school graduate</option>
                                            <option value="College undergraduate" <?php if ($education == 'College undergraduate') echo "selected"; ?>>College undergraduate</option>
                                            <option value="College graduate" <?php if ($education == 'College graduate') echo "selected"; ?>>College graduate</option>
                                            <option value="Post graduate" <?php if ($education == 'Post graduate') echo "selected"; ?>>Post graduate</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="previous_job">Previous Job</label>
                                        <select name="previous_job" id="previous_job" class="form-control">
                                            <option value="">-- Select Previous Job --</option>
                                            <option value="Managers, Professionals" <?php if ($previous_job == 'Managers, Professionals') echo "selected"; ?>>Managers, Professionals</option>
                                            <option value="Technicians and associate professionals" <?php if ($previous_job == 'Technicians and associate professionals') echo "selected"; ?>>Technicians and associate professionals</option>
                                            <option value="Clerical support workers" <?php if ($previous_job == 'Clerical support workers') echo "selected"; ?>>Clerical support workers</option>
                                            <option value="Service and sales workers" <?php if ($previous_job == 'Service and sales workers') echo "selected"; ?>>Service and sales workers</option>
                                            <option value="Skilled agricultural" <?php if ($previous_job == 'Skilled agricultural') echo "selected"; ?>>Skilled agricultural</option>
                                            <option value="forestry and fishery workers" <?php if ($previous_job == 'forestry and fishery workers') echo "selected"; ?>>forestry and fishery workers</option>
                                            <option value="Craft and related trades workers" <?php if ($previous_job == 'Craft and related trades workers') echo "selected"; ?>>Craft and related trades workers</option>
                                            <option value="Plant and machine operators and assemblers" <?php if ($previous_job == 'Plant and machine operators and assemblers') echo "selected"; ?>>Plant and machine operators and assemblers</option>
                                            <option value="Elementary occupations" <?php if ($previous_job == 'Elementary occupations') echo "selected"; ?>>Elementary occupations</option>
                                            <option value="Armed forces occupations " <?php if ($previous_job == 'Armed forces occupations ') echo "selected"; ?>>Armed forces occupations </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="skills">Skills</label>
                                        <select name="skills" id="skills" class="form-control">
                                            <option value="">-- Select Skills --</option>
                                            <option value="Communication and interpersonal Skills" <?php if ($skills == 'Communication and interpersonal Skills') echo "selected"; ?>>Communication and interpersonal Skills</option>
                                            <option value="Social Skills" <?php if ($skills == 'Social Skills') echo "selected"; ?>>Social Skills</option>
                                            <option value="Teamwork" <?php if ($skills == 'Teamwork') echo "selected"; ?>>Teamwork</option>
                                            <option value="Time management" <?php if ($skills == 'Time management') echo "selected"; ?>>Time management</option>
                                            <option value="Leadership skills" <?php if ($skills == 'Leadership skills') echo "selected"; ?>>Leadership skills</option>
                                            <option value="Problem solving skills" <?php if ($skills == 'Problem solving skills') echo "selected"; ?>>Problem solving skills</option>
                                            <option value="Planning and Organizational skills" <?php if ($skills == 'Planning and Organizational skills') echo "selected"; ?>>Planning and Organizational skills</option>
                                            <option value="Ability to learn and adopt" <?php if ($skills == 'Ability to learn and adopt') echo "selected"; ?>>Ability to learn and adopt</option>
                                            <option value="Technology skills" <?php if ($skills == 'Technology skills') echo "selected"; ?>>Technology skills</option>
                                            <option value="Working under pressure and to deadlines" <?php if ($skills == 'Working under pressure and to deadlines') echo "selected"; ?>>Working under pressure and to deadlines</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="trainings_attended">Trainings Attended</label>
                                        <select name="trainings_attended" id="trainings_attended" class="form-control">
                                            <option value="">-- Select Trainings Attended --</option>
                                            <option value="None" <?php if ($trainings_attended == 'None') echo "selected"; ?>>None</option>
                                            <option value="1-2" <?php if ($trainings_attended == '1-2') echo "selected"; ?>>1-2</option>
                                            <option value="3-4" <?php if ($trainings_attended == '3-4') echo "selected"; ?>>3-4</option>
                                            <option value="5 and above" <?php if ($trainings_attended == '5 and above') echo "selected"; ?>>5 and above</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="drug_type">Drug Type</label>
                                        <select name="drug_type" id="drug_type" class="form-control">
                                            <option value="">-- Select Drug Type --</option>
                                            <option value="Amphetamines" <?php if ($drug_type == 'Amphetamines') echo "selected"; ?>>Amphetamines</option>
                                            <option value="Cannabis (Marijuana)" <?php if ($drug_type == 'Cannabis (Marijuana)') echo "selected"; ?>>Cannabis (Marijuana)</option>
                                            <option value="Ecstasy" <?php if ($drug_type == 'Ecstasy') echo "selected"; ?>>Ecstasy</option>
                                            <option value="Cocaine" <?php if ($drug_type == 'Cocaine') echo "selected"; ?>>Cocaine</option>
                                            <option value="Methamphetamine (Shabu)" <?php if ($drug_type == 'Methamphetamine (Shabu)') echo "selected"; ?>>Methamphetamine (Shabu)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="referral">Referral?</label>
                                        <select name="referral" id="referral" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="Yes" <?php if ($referral == 'Yes') echo "selected"; ?>>Yes</option>
                                            <option value="No" <?php if ($referral == 'No') echo "selected"; ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="four_p">Member of 4P's?</label>
                                        <select name="four_p" id="four_p" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="Yes" <?php if ($four_p == 'Yes') echo "selected"; ?>>Yes</option>
                                            <option value="No" <?php if ($four_p == 'No') echo "selected"; ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <input type="submit" value="GO" name="btnGo" id="btnGo" class="btn btn-success btn-sm btn-flat">
                                </div>
                            </form>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                    if (isset($_POST['btnGo'])) {
                                        // $age = $_POST['age'];
                                        $gender = sanitizedString($con,$_POST['gender']);
                                        $previous_job = sanitizedString($con,$_POST['previous_job']);
                                        $education = sanitizedString($con,$_POST['education']);
                                        $skills = sanitizedString($con,$_POST['skills']);
                                        $trainings_attended = sanitizedString($con,$_POST['trainings_attended']);
                                        $drug_type = sanitizedString($con,$_POST['drug_type']);
                                        $referral = sanitizedString($con,$_POST['referral']);
                                        $four_p = sanitizedString($con,$_POST['four_p']);

                                        $sql = "SELECT * FROM eda WHERE 1=1 ";
                                        // if ($age != '') $sql .= "AND $age "; 
                                        if ($gender != '') $sql .= "AND gender = '$gender' ";
                                        if ($previous_job != '') $sql .= "AND previous_job = '$previous_job' ";
                                        if ($education != '') $sql .= "AND education = '$education' ";
                                        if ($skills != '') $sql .= "AND skills LIKE '%$skills%' ";
                                        if ($trainings_attended != '') $sql .= "AND trainings_attended = '$trainings_attended' ";
                                        if ($drug_type != '') $sql .= "AND drug_type LIKE '%$drug_type%' ";
                                        if ($referral != '') $sql .= "AND referral = '$referral' ";
                                        if ($four_p != '') $sql .= "AND four_p = '$four_p' ";

                                        // die($sql);
                                ?>
                                    <table class="table table-hover table-bordered" id="example1">
                                        <thead class="bg-green">
                                            <th>Fullname</th>
                                            <th>Gender</th>
                                            <th>Previous Job</th>
                                            <th>Highest Education</th>
                                            <th>Work Status</th>
                                            <th>Trainings Attended</th>
                                            <th>Drug Type</th>
                                            <th>Referral</th>
                                            <th>4P's</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $qry = mysqli_query($con,$sql) or die(mysqli_error($con));
                                                while ($row = mysqli_fetch_array($qry)) {
                                                    $fullname = $row['lastname'].', '.$row['firstname'].' '.$row['middlename'];
                                                    $genderA = $row['gender'];
                                                    $previous_jobA = $row['previous_job'];
                                                    $educationA = $row['education'];
                                                    $skillsA = $row['skills'];
                                                    $trainings_attendedA = $row['trainings_attended'];
                                                    $drug_typeA = $row['drug_type'];
                                                    $referralA = $row['referral'];
                                                    $four_pA = $row['four_p'];
                                            ?>
                                                <tr>
                                                    <td><?php echo "$fullname"; ?></td>
                                                    <td><?php echo "$genderA"; ?></td>
                                                    <td><?php echo "$previous_jobA"; ?></td>
                                                    <td><?php echo "$educationA"; ?></td>
                                                    <td><?php echo "$skillsA"; ?></td>
                                                    <td><?php echo "$trainings_attendedA"; ?></td>
                                                    <td><?php echo "$drug_typeA"; ?></td>
                                                    <td><?php echo "$referralA"; ?></td>
                                                    <td><?php echo "$four_pA"; ?></td>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
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
    $(function (){
        //Date range picker
        $('#filter_date').daterangepicker()

        //Datatables
        var userNow = "<?php echo $username; ?>";
        var dt = new Date();
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        var monthNow = month[dt.getMonth()];
        var time = monthNow + " " + dt.getDate() + ", " + dt.getFullYear();

        var table = $('#example1').DataTable({
            "pageLength" : false,
            "searching" : false,
            "paging":   false,
            "ordering": false,
            "info":     false,
            "dom": 'Blftrip',
            "buttons" : [
                {
                    extend : "excel",
                    text : "<i class='fa fa-file-excel-o'></i> Excel",
                    titleAttr : "Export to Excel File",
                    className : "btn btn-flat btn-success btn-sm",
                    messageTop: 'Summary',
                    messageBottom: 'Prepared By: '+userNow+'-'+time
                },
                {
                    extend : "print",
                    text : "<i class='fa fa-print'></i> Print",
                    titleAttr : "Print to printer",
                    className : "btn btn-flat btn-success btn-sm",
                    messageTop: '<h3>Summary</h3><h4></h4><h4></h4>',
                    messageBottom: '<label>Prepared By: '+userNow+'-'+time+'</label>'
                }
            ]
        });

        table.buttons( 0, null ).containers().appendTo( '#dt-buttons' );
        // alert("START: "+start+"- END: "+end);
    })
</script>
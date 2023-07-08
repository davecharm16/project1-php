<?php
    $currentPage = "projects";
    $currentTree = "";
    include("inc/header.php");
    $project_id = $_GET['a'];
    $qry = mysqli_query($con,"SELECT name,description FROM projects WHERE id = '$project_id'");
    $row = mysqli_fetch_array($qry);
    $project_name = $row['name'];
    $project_description = html_entity_decode($row['description']);
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo "$project_name"; ?></h1>
      <small><?php echo "$project_description"; ?></small>
      <ol class="breadcrumb">
        <li><a href="projects.php"><i class="fa fa-home"></i> Livelihood Projects</a></li>
        <li class="active"><?php echo "$project_name"; ?></li>
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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead class="bg-green">
                                    <th class="text-center vertical-middle">Fullname</th>
                                    <th class="text-center vertical-middle" width="100px">Action</th>
                                </thead>

                                <tbody>
                                    <?php
                                        $qry2 = mysqli_query($con,"SELECT * FROM member_qualifications WHERE c1 = 'A' AND c2 = 'A' AND c3 = 'A' AND c4 = 'A' AND c5 = 'A' AND c6 = 'A' AND d1 = 'A' AND d2 = 'A' AND d3 = 'A' AND d4 = 'A' AND d5 = 'A' AND d6 = 'A'");
                                        while ($row2 = mysqli_fetch_array($qry2)) {
                                          $member_id = $row2['member_id'];
                                            $fullname = "";
                                            $age = "";
                                            $gender = "";
                                            $civil_status = "";
                                            $educational_attainment = "";
											$occupation = "";
                                            $work_status = "";
                                            $seminar_attended = "";
                                            $drug_type = "";
                                            $rehab_no = "";
                                            $status = "";

                                            $qry3 = mysqli_query($con,"SELECT * FROM members1 WHERE id = '$member_id'");
                                            while ($row3 = mysqli_fetch_array($qry3)) {
                                                $fullname = $row3['fullname'];
                                                $age = $row3['age'];
                                                $gender = $row3['gender'];
                                                $civil_status = $row3['civilstatus'];
                                                $educational_attainment = $row3['educational'];
												$occupation = $row3['occupation'];
                                                $work_status = $row3['work_status'];
                                                $seminar_attended = $row3['seminars_attended'];
                                                $drug_type = $row3['drug_type'];
                                                $rehab_no = $row3['rehab_no'];

                                                echo "
                                                    <script>console.log('$fullname $age')</script>
                                                ";
                                            }

                                            $qry4 = mysqli_query($con,"SELECT status FROM beneficiary WHERE member_id = '$member_id' AND project_id = '$project_id'");
                                            while ($row4 = mysqli_fetch_array($qry4)) {
                                                $status = $row4['status'];
                                            }
                                    ?>

                                    <tr>
                                        <td class="text-left vertical-middle"><a href="#" style="display: block; cursor: pointer; color: black" data-toggle="modal" data-target="#view<?php echo $member_id ?>"><?php echo "$fullname"; ?></a></td>
                                        <td class="text-center vertical-middle">
                                            <select class="form-control" name="status" data-id="<?php echo $member_id ?>">
                                                <option value="">--Select Status --</option>
                                                <option value="A" <?php if ($status == 'A') { echo "selected"; } ?>>Granted</option>
                                                <option value="B" <?php if ($status == 'B') { echo "selected"; } ?>>Not Granted</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="view<?php echo $member_id; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Ex-drug Abuser Profile</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div style="padding: 10px">
                                                        <?php
                                                            if ($age >= 18 && $age <= 23) $displayAge = "18 - 23 years old";
                                                            elseif ($age >= 24 && $age <= 29) $displayAge = "24 - 29 years old";
                                                            elseif ($age >= 30 && $age <= 35) $displayAge = "30 - 35 years old";
                                                            elseif ($age >= 36 && $age <= 41) $displayAge = "36 - 41 years old";
                                                            elseif ($age > 41) $displayAge = "41 years old and above";

                                                            if ($gender == 'A') $displaySex = "Male";
                                                            elseif ($gender == 'B') $displaySex = "Female";

                                                            if ($civil_status == 'A') $displayCs = "Single";
                                                            elseif ($civil_status == 'B') $displayCs = "Married";
                                                            elseif ($civil_status == 'C') $displayCs = "Separated";
                                                            elseif ($civil_status == 'D') $displayCs = "Widowed";

                                                            if ($educational_attainment == 'A') $displayEa = "ALS Graduate";
                                                            elseif ($educational_attainment == 'B') $displayEa = "Elementary Undergraduate";
                                                            elseif ($educational_attainment == 'C') $displayEa = "Elementary Graduate";
                                                            elseif ($educational_attainment == 'D') $displayEa = "High School Undergraduate";
                                                            elseif ($educational_attainment == 'E') $displayEa = "High School Graduate";
                                                            elseif ($educational_attainment == 'F') $displayEa = "College Undergraduate";
                                                            elseif ($educational_attainment == 'G') $displayEa = "College Graduate";
                                                            elseif ($educational_attainment == 'H') $displayEa = "Post-graduate";

                                                            if ($work_status == 'A') $displayWs = "Employed";
                                                            elseif ($work_status == 'B') $displayWs = "Worker";
                                                            elseif ($work_status == 'C') $displayWs = "Self-employed";
                                                            elseif ($work_status == 'D') $displayWs = "Unemployed";

                                                            if ($seminar_attended == 'A') $displaySa = "None";
                                                            elseif ($seminar_attended == 'B') $displaySa = "1-2";
                                                            elseif ($seminar_attended == 'C') $displaySa = "3-4";
                                                            elseif ($seminar_attended == 'D') $displaySa = "5 and above";

                                                            if ($drug_type == 'A') $displayDt = "Amphetamines";
                                                            elseif ($drug_type == 'B') $displayDt = "Cannabis (Marijuana)";
                                                            elseif ($drug_type == 'C') $displayDt = "Ecstasy";
                                                            elseif ($drug_type == 'D') $displayDt = "Cocaine";
                                                            elseif ($drug_type == 'E') $displayDt = "Methamphetamine (Shabu)";

                                                            if ($rehab_no == 'A') $displayNr = "1 time";
                                                            elseif ($rehab_no == 'B') $displayNr = "2-3 times";
                                                            elseif ($rehab_no == 'C') $displayNr = "4-5 times";
                                                            elseif ($rehab_no == 'D') $displayNr = "6 times and above";

                                                        ?> 

                                                        <div class="form-group">
                                                            <label for="fullname">Name: <?php echo "$fullname"; ?></label><br><br>
                                                            <label for="fullname">Age: <?php echo "$displayAge"; ?></label><br><br>
                                                            <label for="fullname">Gender: <?php echo "$displaySex"; ?></label><br><br>
                                                            <label for="fullname">Civil Status: <?php echo "$displayCs"; ?></label><br><br>
                                                            <label for="fullname">Highest Education Attainment: <?php echo "$displayEa"; ?></label><br><br>
															<label for="fullname">Occupation: <?php echo "$occupation"; ?></label><br><br>
                                                            <label for="fullname">Work Status: <?php echo "$displayWs"; ?></label><br><br>
                                                            <label for="fullname">Seminars Attended: <?php echo "$displaySa"; ?></label><br><br>
                                                            <label for="fullname">Drug Type Taken: <?php echo "$displayDt"; ?></label><br><br>
                                                            <label for="fullname">No. of Rehabilitation: <?php echo "$displayNr"; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
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
        $('select[name=status]').change(function(){
            var status = $(this).val();
            var member_id = $(this).data('id');
            var project_id = "<?php echo $project_id; ?>";
            $.ajax({
                type: 'POST',
                url: 'projects_list_status.php',
                data:{
                    status : status,
                    member_id : member_id,
                    project_id : project_id
                }
            });
        });
    })
</script>
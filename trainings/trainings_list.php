<?php
    $currentPage = "trainings";
    $currentTree = "";
    include("inc/header.php");
    $training_id = $_GET['a'];
    $qry = mysqli_query($con,"SELECT name,description FROM trainings WHERE id = '$training_id'");
    $row = mysqli_fetch_array($qry);
    $training_name = $row['name'];
    $training_description = html_entity_decode($row['description']);
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo "$training_name"; ?></h1>
      <small><?php echo "$training_description"; ?></small>
      <ol class="breadcrumb">
        <li><a href="trainings.php"><i class="fa fa-gears"></i> Trainings</a></li>
        <li class="active"><?php echo "$training_name"; ?></li>
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
                                        $qry2 = mysqli_query($con,"SELECT * FROM enrolee WHERE training_id = '$training_id'");
                                        while ($row2 = mysqli_fetch_array($qry2)) {
                                            $eda_id = $row2['member_id'];
                                            $status = $row2['status'];
                                            $lastname = "";
                                            $firstname = "";
                                            $middlename = "";
                                            $qry3 = mysqli_query($con,"SELECT * FROM eda WHERE eda_id = '$eda_id'");
                                            while ($row3 = mysqli_fetch_array($qry3)) {
                                                $lastname = $row3['lastname'];
                                                $firstname = $row3['firstname'];
                                                $middlename = $row3['middlename'];
                                                $birthdate = $row3['birthdate'];
                                                $today = date("Y-m-d");
                                                $diff = date_diff(date_create($birthdate), date_create($today));
                                                $age = $diff->format('%y');
                                                $gender = $row3['gender'];
                                                $address = $row3['address'];
                                                $contact_no = $row3['contact_no'];
                                                $email_address = $row3['email_address'];
                                                $education = $row3['education'];
                                                $previous_job = $row3['previous_job'];
                                                $skills = $row3['skills'];
                                                $trainings_attended = $row3['trainings_attended'];
                                                $drug_type = $row3['drug_type'];
                                                $four_p = $row3['four_p'];
                                                $referral = $row3['referral'];
                                                $picture = $row3['picture'];
                                            }
                                    ?>

                                    <tr>
                                        <td class="text-left vertical-middle"><a href="#" style="display: block; cursor: pointer; color: black" data-toggle="modal" data-target="#view<?php echo $eda_id ?>"><?php echo "$lastname, $firstname $middlename"; ?></a></td>
                                        <td class="text-center vertical-middle">
                                            <select class="form-control" name="status" data-id="<?php echo $eda_id ?>">
                                                <option value="">--Select Status --</option>
                                                <option value="A" <?php if ($status == 'A') { echo "selected"; } ?>>Enrolled</option>
                                                <option value="B" <?php if ($status == 'B') { echo "selected"; } ?>>Incomplete</option>
                                                <option value="C" <?php if ($status == 'C') { echo "selected"; } ?>>Done</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="view<?php echo $eda_id; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">EDA Profile</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div style="padding: 10px">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12 text-center">
                                                                    <img src="<?php echo $picture ?>" class="img-circle img-bordered" width="25%" alt="Profile Picture" />
                                                                </div>
                                                            </div><br><br>
                                                            <label for="fullname">Name: <?php echo "$lastname, $firstname $middlename"; ?></label><br><br>
                                                            <label for="fullname">Birth Date: <?php echo date("F d, Y", strtotime($birthdate)); ?></label><br><br>
                                                            <label for="fullname">Age: <?php echo "$age"; ?></label><br><br>
                                                            <label for="fullname">Contact Number: <?php echo "$contact_no"; ?></label><br><br>
                                                            <label for="fullname">Email Address: <?php echo "$email_address"; ?></label><br><br>
                                                            <label for="fullname">Gender: <?php echo "$gender"; ?></label><br><br>
                                                            <label for="fullname">Highest Education Attainment: <?php echo "$education"; ?></label><br><br>
                                                            <label for="fullname">Previous Job: <?php echo "$previous_job"; ?></label><br><br>
                                                            <label for="fullname">Skills: <?php echo "$skills"; ?></label><br><br>
                                                            <label for="fullname">No. of Trainings Attended: <?php echo "$trainings_attended"; ?></label><br><br>
                                                            <label for="fullname">Drug Type Taken: <?php echo "$drug_type"; ?></label><br><br>
                                                            <label for="fullname">4P's Member?: <?php echo "$four_p"; ?></label><br><br>
                                                            <label for="fullname">Referrals from Rehabilitation Center?: <?php echo "$referral"; ?></label>
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
            var training_id = "<?php echo $training_id; ?>";
            $.ajax({
                type: 'POST',
                url: 'trainings_list_status.php',
                data:{
                    status : status,
                    member_id : member_id,
                    training_id : training_id
                }
            });
        });
    })
</script>
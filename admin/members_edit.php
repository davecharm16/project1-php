<?php
    $currentPage = "members";
    $currentTree = "";
    include("inc/header.php");
    $member_id = $_GET['a'];
    $qry = mysqli_query($con,"SELECT * FROM eda WHERE id = '$member_id'");
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
    $eda_id = $row['eda_id'];
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit EDA</h1>
        <ol class="breadcrumb">
            <li><a href="members.php"><i class="fa fa-user"></i> EDA Management</a></li>
            <li class="active">Edit EDA</li>
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
                        <form action="members_edit_info.php?id=<?php echo $member_id; ?>" method="POST">
                            <legend>USER ACCOUNT</legend>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $eda_id; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                                    </div>
                                </div>
                            </div>
                            <legend>EDA INFORMATION</legend>
                            <div class="row">
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
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="<?php echo $lastname; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="birthdate">Date of Birth</label>
                                        <input type="date" name="birthdate" id="birthdate" value="<?php echo $birthdate; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" value="<?php echo $address; ?>" class="form-control" placeholder="House No./Street Name/Bldg. No., Barangay, Municipality/City, Province" required>
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
                            </div>
                            <input type="submit" name="submit" id="submit" class="btn btn-success btn-flat pull-right" value="Update">
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
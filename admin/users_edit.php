<?php
    $currentPage = "users";
    $currentTree = "";
    include("inc/header.php");
    $user_id = $_GET['a'];
    $qry = mysqli_query($con,"SELECT * FROM user_accounts WHERE id = '$user_id'");
    $row = mysqli_fetch_array($qry);
    $user_type = $row['user_type'];
    $username= $row['username'];
    $qry2 = mysqli_query($con,"SELECT * FROM user_info WHERE user_id = '$user_id'");
    $row2 = mysqli_fetch_array($qry2);
    $lastname = $row2['lastname'];
    $firstname = $row2['firstname'];
    $middlename = $row2['middlename'];
    $address = $row2['address'];
    $contact_no = $row2['contact_no'];
    $email_address = $row2['email_address'];
    $qry3 = mysqli_query($con,"SELECT * FROM user_images WHERE user_id = '$user_id'");
    $row3 = mysqli_fetch_array($qry3);
    $picture = $row3['image'];
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit User</h1>
        <ol class="breadcrumb">
            <li><a href="users.php"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">Edit User</li>
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
                        <img src="<?php echo $picture ?>" class="img-circle img-bordered" width="50%" alt="Profile Picture" /><br><br>
                        <form method="POST" action="users_edit_image.php?id=<?php echo $user_id ?>" enctype="multipart/form-data">
                            <input type="file" name="picture" required/><br>
                            <input type="submit" name="submit" class="btn btn-success btn-flat btn-sm" value="SAVE" style="width: 50%" />
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <form method="POST" action="users_edit_info.php?id=<?php echo $user_id ?>">
                            <legend>User Info</legend>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>" placeholder="Lastname" autofocus required />
                                </div>
                                <div class="col-sm-4">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>" placeholder="Firstname" required />
                                </div>
                                <div class="col-sm-4">
                                    <label>Middlename</label>
                                    <input type="text" class="form-control" name="middlename" value="<?php echo $middlename ?>" placeholder="Middlename" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $address ?>" placeholder="Address" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Contact No.</label>
                                    <input type="text" class="form-control" name="contact_no" value="<?php echo $contact_no ?>" placeholder="Contact No." required />
                                </div>
                                <div class="col-sm-6">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" name="email_address" value="<?php echo $email_address ?>" placeholder="Email Address" required />
                                </div>
                            </div><br>
                            <input type="submit" name="submit" class="btn btn-success btn-flat" value="SAVE" style="width: 100%" />
                        </form>
                        <br><br>
                        <form method="POST" action="users_edit_pass.php?id=<?php echo $user_id ?>">
                            <legend>User Account</legend>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo $username ?>" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="new_pass" placeholder="New Password" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_pass" placeholder="Confirm Password" />
                                </div>
                            </div><br>
                            <input type="submit" name="submit" class="btn btn-success btn-flat" value="SAVE" style="width: 100%" />
                        </form>
                    </div>
                </div><br>
            </div>
        </div>
    </section>
    <!-- /.content -->

<?php include("inc/footer.php"); ?>
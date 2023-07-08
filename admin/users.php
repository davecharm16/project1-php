<?php
    $currentPage = "users";
    $currentTree = "";
    include("inc/header.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Users <button type="button" class="btn btn-success btn-sm btn-flat" title="Add" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span></button></h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-users"></i> Users</li>
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
                                    <th class="text-center vertical-middle">Name</th>
                                    <th class="text-center vertical-middle">Address</th>
                                    <th class="text-center vertical-middle">Contact No.</th>
                                    <th class="text-center vertical-middle">Email Address</th>
                                    <th class="text-center vertical-middle">User Type</th>
                                    <th class="text-center vertical-middle">Action</th>
                                </thead>

                                <tbody>
                                    <?php
                                        $qry = mysqli_query($con,"SELECT * FROM user_accounts WHERE user_type <> 'ADMIN' AND user_type <> 'COMPANY' AND user_type <> 'USER'");
                                        while ($row = mysqli_fetch_array($qry)) {
                                            $user_id = $row['id'];
                                            $user_type = $row['user_type'];
                                            $qry2 = mysqli_query($con,"SELECT * FROM user_info WHERE user_id = '$user_id'");
                                            $row2 = mysqli_fetch_array($qry2);
                                            $fullname = $row2['lastname'].", ".$row2['firstname'];
                                            $address = $row2['address'];
                                            $contact_no = $row2['contact_no'];
                                            $email_address = $row2['email_address'];
                                    ?>

                                    <tr>
                                        <td class="text-center vertical-middle"><?php echo "$fullname"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$address"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$contact_no"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$email_address"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$user_type"; ?></td>
                                        <td class="text-center vertical-middle">
                                            <a href="users_edit.php?a=<?php echo $user_id ?>" class="btn btn-primary btn-sm btn-flat" title="Edit"><span class="fa fa-pencil"></span></a>
                                            <button type="button" class="btn btn-danger btn-sm btn-flat" title="Delete" data-toggle="modal" data-target="#delete<?php echo $user_id ?>"><span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>

                                    
                                    <div class="modal fade" id="delete<?php echo $user_id ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Delete User</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Do you really want to delete this data? Once you've agreed tt cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="users_delete.php?id=<?php echo $user_id ?>" class="btn btn-success btn-sm" name="submit">YES</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NO</button>
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
    
    <form method="POST" action="users_add.php" enctype="multipart/form-data">
        <div class="modal fade" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add User</h4>
                    </div>
                    <div class="modal-body">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Lastname" autofocus required/><br>
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname" required/><br>
                        <label>Middlename</label>
                        <input type="text" class="form-control" name="middlename" placeholder="Middlename" required/><br>
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address" required/><br>
                        <label>Contact No.</label>
                        <input type="text" class="form-control" name="contact_no" placeholder="Contact No." required/><br>
                        <label>Email Address</label>
                        <input type="text" class="form-control" name="email_address" placeholder="Email Address" required/><br>
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required/><br>
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required/><br>
                        <label>User Type</label>
                        <select class="form-control" name="user_type" required>
                            <option value="">Select User Type</option>
                            <option value="PESO">PESO</option>
                            <option value="DOLE">DOLE</option>
                            <option value="TESDA">TESDA</option>
                            <option value="DSWD">DSWD</option>
                        </select><br>
                        <label>Profile Picture</label>
                        <input type="file" name="picture" required/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" name="submit">Add</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>

<?php include("inc/footer.php"); ?>
<?php
    $currentPage = "members";
    $currentTree = "";
    include("inc/header.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>EDA Management <button type="button" class="btn btn-success btn-sm btn-flat" title="Add" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span></button></h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-user"></i> EDA Management</li>
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
                                    <th class="text-left vertical-middle">Username</th>
                                    <th class="text-left vertical-middle">Name</th>
                                    <th class="text-left vertical-middle">Gender</th>
                                    <th class="text-center vertical-middle" width="100px">Action</th>
                                </thead>

                                <tbody>
                                    <?php
                                        $qry = mysqli_query($con,"SELECT * FROM eda");
                                        while ($row = mysqli_fetch_array($qry)) {
                                            $member_id = $row['id'];
                                            $eda_id = $row['eda_id'];
                                            $fullname = $row['lastname'].', '.$row['firstname'].' '.$row['middlename'];
                                            $gender = $row['gender'];
                                    ?>

                                    <tr>
                                        <td class="text-left vertical-middle"><?php echo "$eda_id"; ?></td>
                                        <td class="text-left vertical-middle"><?php echo "$fullname"; ?></td>
                                        <td class="text-left vertical-middle"><?php echo "$gender"; ?></td>
                                        <td class="text-center vertical-middle">
                                            <a href="members_edit.php?a=<?php echo $member_id; ?>" class="btn btn-primary btn-sm btn-flat" title="Edit"><span class="fa fa-pencil"></span></a>
                                            <button type="button" class="btn btn-danger btn-sm btn-flat" title="Delete" data-toggle="modal" data-target="#delete<?php echo $member_id ?>"><span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete<?php echo $member_id ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Delete EDA</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Do you really want to delete this data? Once you've agreed tt cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="members_delete.php?id=<?php echo $member_id ?>" class="btn btn-success btn-sm" name="submit">YES</a>
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
    
    <form method="POST" action="members_add.php?username=<?php echo $username ?>" enctype="multipart/form-data">
        <div class="modal fade" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add Member</h4>
                    </div>
                    <div class="modal-body">
                        <div style="overflow-y: scroll; overflow-x: hidden; height: 400px; padding: 10px">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control form-control-sm" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="middlename">Middle Name</label>
                                <input type="text" name="middlename" id="middlename" class="form-control form-control-sm" placeholder="Middle Name" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control form-control-sm" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birth Date</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" id="gender1" value="MALE" required>
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" id="gender1" value="FEMALE" required>
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="House No./Street Name/Bldg. No., Barangay, Municipality/City, Province" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_no">Contact No.</label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control form-control-sm" placeholder="Contact No." required>
                            </div>
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input type="text" name="email_address" id="email_address" class="form-control form-control-sm" placeholder="Email Address" required>
                            </div>
                        </div>
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
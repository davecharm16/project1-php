<?php
    $currentPage = "trainings";
    $currentTree = "";
    include("inc/header.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Trainings <button type="button" class="btn btn-success btn-sm btn-flat" title="Add" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span></button></h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-gears"></i> Trainings</li>
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
                                    <th class="text-center vertical-middle">Training Name</th>
                                    <th class="text-center vertical-middle">Description</th>
                                    <th class="text-center vertical-middle">Training Date</th>
                                    <th class="text-center vertical-middle">Posted By</th>
                                    <th class="text-center vertical-middle">Posted On</th>
                                    <th class="text-center vertical-middle">Status</th>
                                    <th class="text-center vertical-middle">Action</th>
                                </thead>

                                <tbody>
                                    <?php
                                        $qry = mysqli_query($con,"SELECT * FROM trainings");
                                        while ($row = mysqli_fetch_array($qry)) {
                                            $training_id = $row['id'];
                                            $training_name = $row['name'];
                                            $training_description = html_entity_decode($row['description']);
                                            $training_date = $row['training_date'];
                                            $posted_by = $row['posted_by'];
                                            $posted_on = $row['posted_on'];
                                            $status = $row['status'];
                                    ?>

                                    <tr>
                                        <td class="text-center vertical-middle"><?php echo "$training_name"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$training_description"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$training_date"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$posted_by"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$posted_on"; ?></td>
                                        <td class="text-center vertical-middle">
                                            <select class="form-control" name="status" data-id="<?php echo $training_id ?>">
                                                <option value="open" <?php if ($status == 'open') { echo "selected"; } ?>>Open</option>
                                                <option value="ongoing" <?php if ($status == 'ongoing') { echo "selected"; } ?>>On Going</option>
                                                <option value="closed" <?php if ($status == 'closed') { echo "selected"; } ?>>Closed</option>
                                            </select>
                                        </td>
                                        <td class="text-center vertical-middle">
                                            <a href="trainings_list.php?a=<?php echo $training_id ?>" class="btn bg-navy btn-sm btn-flat" title="Short List"><span class="fa fa-list"></span></a>
                                            <a href="trainings_edit.php?a=<?php echo $training_id ?>" class="btn btn-primary btn-sm btn-flat" title="Edit"><span class="fa fa-pencil"></span></a>
                                            <button type="button" class="btn btn-danger btn-sm btn-flat" title="Delete" data-toggle="modal" data-target="#delete<?php echo $training_id ?>"><span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>

                                    
                                    <div class="modal fade" id="delete<?php echo $training_id ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Delete Training</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Do you really want to delete this data? Once you've agreed tt cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="trainings_delete.php?id=<?php echo $training_id ?>" class="btn btn-success btn-sm" name="submit">YES</a>
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
    
    <form method="POST" action="trainings_add.php?username=<?php echo $username ?>" enctype="multipart/form-data">
        <div class="modal fade" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add Training</h4>
                    </div>
                    <div class="modal-body">
                        <label>Training Name</label>
                        <input type="text" class="form-control" name="training_name" placeholder="Training Name" autofocus required/><br>
                        <label>Training Description</label>
                        <textarea class="textarea" name="training_description" placeholder="Training Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br>
                        <label>Training Date</label>
                        <input type="date" class="form-control" name="training_date" required /><br>
                        <label>Featured Image</label>
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


<script>
    $(function (){
        $('select[name=status]').change(function(){
            var status = $(this).val();
            var training_id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: 'trainings_status.php',
                data:{status : status, training_id : training_id}
            });
        });
    })
</script>
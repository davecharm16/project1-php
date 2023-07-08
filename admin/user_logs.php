<?php
    $currentPage = "trainings";
    $currentTree = "";
    include("inc/header.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>User Logs</h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-book"></i> User Logs</li>
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
                            <table class="table table-bordered" id="dataTable1">
                                <thead class="bg-green">
                                    <th class="text-center vertical-middle">Log ID</th>
                                    <th class="text-center vertical-middle">Description</th>
                                    <th class="text-center vertical-middle">Date</th>
                                    <th class="text-center vertical-middle">Time</th>
                                </thead>

                                <tbody>
                                    <?php
                                        $qry = mysqli_query($con,"SELECT * FROM user_logs ORDER BY id DESC");
                                        while ($row = mysqli_fetch_array($qry)) {
                                            $id = $row['id'];
                                            $description = $row['description'];
                                            $date = $row['date'];
                                            $time = $row['time'];
                                    ?>

                                    <tr>
                                        <td class="text-center vertical-middle"><?php echo "$id"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$description"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$date"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$time"; ?></td>
                                    </tr>

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
    $(function(){
        $('#dataTable1').DataTable({
            order : [[ 0, "desc" ]]
        });
    })
</script>
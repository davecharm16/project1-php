<?php
    $currentPage = "jobs";
    $currentTree = "";
    include("inc/header.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Jobs</h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-briefcase"></i> Jobs</li>
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
                                    <th class="text-center vertical-middle">Job Name</th>
                                    <th class="text-center vertical-middle">Job Description</th>
                                    <th class="text-center vertical-middle">Company</th>
                                    <th class="text-center vertical-middle">Posted By</th>
                                    <th class="text-center vertical-middle">Posted On</th>
                                </thead>

                                <tbody>
                                    <?php
                                        $qry = mysqli_query($con,"SELECT * FROM jobs");
                                        while ($row = mysqli_fetch_array($qry)) {
                                            $job_id = $row['id'];
                                            $job_name = $row['name'];
                                            $job_description = html_entity_decode($row['description']);
                                            $company_id = $row['company_id'];
                                            $posted_by = $row['posted_by'];
                                            $posted_on = $row['posted_on'];
                                            $status = $row['status'];
                                            $qry2 = mysqli_query($con,"SELECT * FROM company WHERE id = '$company_id'");
                                            $row2 = mysqli_fetch_array($qry2);
                                            $company = $row2['company_name'];
                                    ?>

                                    <tr>
                                        <td class="text-center vertical-middle"><?php echo "$job_name"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$job_description"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$company"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$posted_by"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$posted_on"; ?></td>
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
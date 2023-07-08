<?php
    $currentPage = "dashboard";
    $currentTree = "dashboard";
    include("inc/header.php");

    $qry1 = mysqli_query($con,"SELECT * FROM eda");
    $qry2 = mysqli_query($con,"SELECT DISTINCT(member_id) FROM applicants");
    $count1 = mysqli_num_rows($qry1);
    $count2 = mysqli_num_rows($qry2);
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo "$count1"; ?></h3>

                    <p>No. of EDA</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <!-- <a href="jobs.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo "$count2"; ?></h3>

                    <p>Qualified EDA for Jobs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
                <!-- <a href="jobs.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

<?php include("inc/footer.php"); ?>
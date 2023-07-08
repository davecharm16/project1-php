<?php
    $currentPage = "dashboard";
    $currentTree = "dashboard";
    include("inc/header.php");

    $qry1 = mysqli_query($con,"SELECT DISTINCT(member_id) FROM applicants");
    $qry2 = mysqli_query($con,"SELECT DISTINCT(member_id) FROM enrolee");
    $qry3 = mysqli_query($con,"SELECT DISTINCT(member_id) FROM beneficiary");
    $qry4 = mysqli_query($con,"SELECT * FROM eda");
    $qry5 = mysqli_query($con,"SELECT * FROM user_accounts WHERE user_type <> 'ADMIN' AND user_type <> 'USER'");
    $qry6 = mysqli_query($con,"SELECT * FROM eda");
    $count1 = mysqli_num_rows($qry1);
    $count2 = mysqli_num_rows($qry2);
    $count3 = mysqli_num_rows($qry3);
    $count4 = mysqli_num_rows($qry4);
    $count5 = mysqli_num_rows($qry5);
    $count6 = mysqli_num_rows($qry6);
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
                <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo "$count1"; ?></h3>

                    <p>Qualified EDA for Jobs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
                <!-- <a href="jobs.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo "$count2"; ?></h3>

                    <p>Qualified EDA for Trainings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-gear-b"></i>
                </div>
                <!-- <a href="trainings.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo "$count3"; ?></h3>

                    <p>Qualified EDA for Referrals</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-home-outline"></i>
                </div>
                <!-- <a href="projects.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo "$count4"; ?></h3>

                    <p>No. of EDA</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-person"></i>
                </div>
                <!-- <a href="members.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row"  style="margin-bottom: 20px;">
            <div class="col-sm-6 table-responsive">
                <table id="highchart" data-graph-container-before="1" data-graph-type="column" style="display: none;">
                <caption>Summary of Qualified EDA's</caption>
                    <thead>
                        <tr>
                            <th>Qualified To</th>
                            <th>No. of Qualified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jobs</td>
                            <td><?php echo "$count1"; ?></td>
                        </tr>
                        <tr>
                            <td>Trainings</td>
                            <td><?php echo "$count2"; ?></td>
                        </tr>
                        <tr>
                            <td>Livelihood</td>
                            <td><?php echo "$count3"; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <table id="highchart2" data-graph-container-before="1" data-graph-type="line" style="display: none;">
                <caption>EDA per Date</caption>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Applicants</th>
                            <th>Enrollee</th>
                            <th>Beneficiary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $date = strtotime('08/12/2021');
                            
                            while ($date <= strtotime(date('m/d/Y'))) {
                                $sql = "SELECT * FROM applicants WHERE application_date = '".date("m/d/Y",$date)."'";
                                $qry = mysqli_query($con,$sql);
                                $total_applicants = mysqli_num_rows($qry);
                                $sql2 = "SELECT * FROM enrolee WHERE application_date = '".date("m/d/Y",$date)."'";
                                $qry2 = mysqli_query($con,$sql2);
                                $total_enrollee = mysqli_num_rows($qry2);
                                $sql3 = "SELECT * FROM beneficiary WHERE application_date = '".date("m/d/Y",$date)."'";
                                $qry3 = mysqli_query($con,$sql3);
                                $total_beneficiary = mysqli_num_rows($qry3);

                                echo "
                                    <tr>
                                        <td>".date('m/d/Y',$date)."</td>
                                        <td>$total_applicants</td>
                                        <td>$total_enrollee</td>
                                        <td>$total_beneficiary</td>
                                    </tr>
                                ";

                                $date += (3600*24);
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->

<?php include("inc/footer.php"); ?>
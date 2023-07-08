<?php
    $currentPage = "dashboard";
    $currentTree = "dashboard";
    include("inc/header.php");

    $qry1 = mysqli_query($con,"SELECT * FROM eda");
    $qry2 = mysqli_query($con,"SELECT DISTINCT(member_id) FROM beneficiary");
    $count1 = mysqli_num_rows($qry1);
    $count2 = mysqli_num_rows($qry2);
    $qry3 = mysqli_query($con,"SELECT DISTINCT(beneficiary.member_id) FROM beneficiary LEFT JOIN eda ON beneficiary.member_id = eda.eda_id WHERE eda.gender = 'MALE'");
    $countMale = mysqli_num_rows($qry3);
    $qry4 = mysqli_query($con,"SELECT DISTINCT(beneficiary.member_id) FROM beneficiary LEFT JOIN eda ON beneficiary.member_id = eda.eda_id WHERE eda.gender = 'FEMALE'");
    $countFemale = mysqli_num_rows($qry4);
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
                <!-- <a href="projects.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo "$count2"; ?></h3>

                    <p>Qualified EDA for Referrals</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-home-outline"></i>
                </div>
                <!-- <a href="projects.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row"  style="margin-bottom: 20px;">
        <div class="col-sm-6 table-responsive">
                <table id="highchart" data-graph-container-before="1" data-graph-type="pie" style="display: none;" data-graph-datalabels-enabled="1">
                <caption>Qualified EDA's per Gender</caption>
                    <thead>
                        <tr>
                            <th>Gender</th>
                            <th>No. of</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Male</td>
                            <td data-graph-name="Male"><?php echo "$countMale"; ?></td>
                        </tr>
                        <tr>
                            <td>Female</td>
                            <td data-graph-name="Female"><?php echo "$countFemale"; ?></td>
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
                            <th>Beneficiary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $date = strtotime('08/12/2021');
                            
                            while ($date <= strtotime(date('m/d/Y'))) {
                                $sql = "SELECT * FROM beneficiary WHERE application_date = '".date("m/d/Y",$date)."'";
                                $qry = mysqli_query($con,$sql);
                                $total_beneficiary = mysqli_num_rows($qry);

                                echo "
                                    <tr>
                                        <td>".date('m/d/Y',$date)."</td>
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
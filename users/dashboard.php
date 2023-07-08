<?php
    $currentPage = "dashboard";
    $currentTree = "dashboard";
    include("inc/header.php");

    //JOBS COUNT
        $count1 = 0;
        $sql = "SELECT * FROM eda_answers WHERE eda_id = '$username';";
        $qry = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($qry);
        $domain1 = $row['domain1'];
        $domain2 = $row['domain2'];
        $domain3 = $row['domain3'];
        $domain4 = $row['domain4'];
        $domain5 = $row['domain5'];
        $sql3 = "SELECT * FROM jobs WHERE status = 'show' ORDER BY id DESC";
        $qry3 = mysqli_query($con,$sql3);
        if (mysqli_num_rows($qry3) > 0) {
            while ($row3 = mysqli_fetch_array($qry3)) {
                $job_id = $row3['id'];
                $job_name = $row3['name'];
                $company_id = $row3['company_id'];
                $job_domain = $row3['domain'];
                $skills = $row3['skills'];
                $education = $row3['education'];
                $interests = $row3['personality'];

                $sql6 = "SELECT * FROM applicants WHERE member_id = '$username' AND job_id = '$job_id'";
                $qry6 = mysqli_query($con,$sql6);

                $sql5 = "SELECT * FROM company WHERE id = '$company_id'";
                $qry5 = mysqli_query($con,$sql5);
                $row5 = mysqli_fetch_array($qry5);
                $company_name = $row5['company_name'];

                $test_education_attainment = false;
                $test_domain = true;
                $test_skills = true;
                $test_interests = true;

                $educationList = explode(",",$education);
                foreach ($educationList as $education1) {
                    if ($eda_education == $education1) {
                        $test_education_attainment = true;
                    }
                }
                if ($test_education_attainment) {
                    $jobDomainList = explode(",",$job_domain);
                    foreach ($jobDomainList as $job_domain1) {
                        if ($job_domain1 == 'Extroversion') {
                            if ($domain1 < 4.44) {
                                $test_domain = false;
                                break;
                            }
                        }
                        else if ($job_domain1 == 'Agreeableness') {
                            if ($domain2 < 5.23) {
                                $test_domain = false;
                                break;
                            }
                        }
                        else if ($job_domain1 == 'Conscientiousness') {
                            if ($domain3 < 5.4) {
                                $test_domain = false;
                                break;
                            }
                        }
                        else if ($job_domain1 == 'Emotional Stability') {
                            if ($domain4 < 4.83) {
                                $test_domain = false;
                                break;
                            }
                        }
                        else if ($job_domain1 == 'Openness') {
                            if ($domain5 < 5.38) {
                                $test_domain = false;
                                break;
                            }
                        }
                    }
                }


                if ($test_domain) {
                    $skillList = explode(",",$skills);
                    foreach ($skillList as $skills1) {
                        $sql4 = "SELECT * FROM eda WHERE eda_id = '$username' AND skills LIKE '%$skills1%'";
                        $qry4 = mysqli_query($con,$sql4);
                        if (mysqli_num_rows($qry4) < 1) {
                            $test_skills = false;
                            break;
                        } 
                    }
                }

                if ($test_skills) {
                    $interestList = explode(",",$interests);
                    foreach ($interestList as $interest1) {
                        $sql4 = "SELECT * FROM eda_answers WHERE eda_id = '$username' AND interests LIKE '%$interest1%'";
                        $qry4 = mysqli_query($con,$sql4);
                        if (mysqli_num_rows($qry4) < 1) {
                            $test_interests = false;
                            break;
                        } 
                    }
                }

                if (!$test_education_attainment && !$test_domain && !$test_skills && !$test_interests) {
                    continue;
                }
                else{
                    if ($test_education_attainment && $test_domain && $test_skills && $test_interests) {
                        $count1++;
                    }
                }
            }
        }
    //

    //TRAININGS
        $count2 = 0;
        $sql3 = "SELECT * FROM trainings WHERE status = 'open' ORDER BY id DESC";
        $qry3 = mysqli_query($con,$sql3);
        if (mysqli_num_rows($qry3) > 0) {
            while ($row3 = mysqli_fetch_array($qry3)) {
                $training_id = $row3['id'];
                $training_name = $row3['name'];
                $training_description = html_entity_decode($row3['description']);
                $skills = $row3['skills'];

                $sql6 = "SELECT * FROM enrolee WHERE member_id = '$username' AND training_id = '$training_id'";
                $qry6 = mysqli_query($con,$sql6);

                // $test_skills = false;

                $skillList = explode(",",$skills);
                foreach ($skillList as $skills1) {
                    $sql4 = "SELECT * FROM eda WHERE eda_id = '$username' AND skills LIKE '%$skills1%'";
                    $qry4 = mysqli_query($con,$sql4);
                    if (mysqli_num_rows($qry4) > 0) {
                        continue;
                    }
                    else{
                        $test_skills = true;
                        break;
                    }
                }

                if ($test_skills) {
                    $count2++;
                }
            }
        }
    //

    //PROJECTS
        $count3 = 0;
        if ($age >= 18 && $four_p == 'Yes' && $referral == 'Yes') {
            $sql2 = "SELECT * FROM projects WHERE status = 'show'";
            $qry2 = mysqli_query($con,$sql2);
            while ($row2 = mysqli_fetch_array($qry2)) {
                $count3++;
            }
        }
    //
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
    <section class="content"><!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo "$count1"; ?></h3>

                    <p>No of Suggested Jobs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
                <a href="pi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo "$count2"; ?></h3>

                    <p>No. of Suggested Trainings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-gear-b"></i>
                </div>
                <a href="pi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo "$count3"; ?></h3>

                    <p>No. of Suggested Referrals</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-home-outline"></i>
                </div>
                <a href="pi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

<?php include("inc/footer.php"); ?>
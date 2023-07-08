<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $key = $_GET['s'];
    $eda_id = $_GET['eda_id'];
    date_default_timezone_set("Asia/Manila");
    $created_on = date("m/d/Y");

    if ($key == 'interestProject') {
        if (isset($_POST['btnIpYes'])) {
            $sql = "SELECT * FROM beneficiary WHERE member_id = '$eda_id' AND project_id = '$id'";
            $qry = mysqli_query($con,$sql);

            if (mysqli_num_rows($qry) < 1) {
                $sql2 = "INSERT INTO beneficiary (project_id,member_id,application_date,status) VALUES ('$id','$eda_id','$created_on','');";
                $qry2 = mysqli_query($con,$sql2);

                echo "<script>window.location.replace('pi.php')</script>";
            }
        }
        else {
            $sql2 = "DELETE FROM beneficiary WHERE project_id = '$id' AND member_id = '$eda_id'";
            $qry2 = mysqli_query($con,$sql2);

            echo "<script>window.location.replace('pi.php')</script>";
        }
    }
    else if ($key == 'interestJob') {
        if (isset($_POST['btnIjYes'])) {
            $sql = "SELECT * FROM applicants WHERE member_id = '$eda_id' AND job_id = '$id'";
            $qry = mysqli_query($con,$sql);

            if (mysqli_num_rows($qry) < 1) {
                $sql2 = "INSERT INTO applicants (job_id,member_id,application_date,status) VALUES ('$id','$eda_id','$created_on','');";
                $qry2 = mysqli_query($con,$sql2);

                echo "<script>window.location.replace('pi.php')</script>";
            }
        }
        else {
            $sql2 = "DELETE FROM applicants WHERE job_id = '$id' AND member_id = '$eda_id'";
            $qry2 = mysqli_query($con,$sql2);

            echo "<script>window.location.replace('pi.php')</script>";
        }
    }
    else if ($key == 'interestTraining') {
        if (isset($_POST['btnItYes'])) {
            $sql = "SELECT * FROM enrolee WHERE member_id = '$eda_id' AND training_id = '$id'";
            $qry = mysqli_query($con,$sql);

            if (mysqli_num_rows($qry) < 1) {
                $sql2 = "INSERT INTO enrolee (training_id,member_id,application_date,status) VALUES ('$id','$eda_id','$created_on','');";
                $qry2 = mysqli_query($con,$sql2);

                echo "<script>window.location.replace('pi.php')</script>";
            }
        }
        else {
            $sql2 = "DELETE FROM enrolee WHERE training_id = '$id' AND member_id = '$eda_id'";
            $qry2 = mysqli_query($con,$sql2);

            echo "<script>window.location.replace('pi.php')</script>";
        }
    }
    
    // if (isset($_POST['education'])) $education = sanitizedString($con,$_POST['education']);
    // if (isset($_POST['previous_job']))  $previous_job = sanitizedString($con,$_POST['previous_job']);
    // if (isset($_POST['trainings_attended'])) $trainings_attended = sanitizedString($con,$_POST['trainings_attended']);
    // if (isset($_POST['four_p'])) $four_p = sanitizedString($con,$_POST['four_p']);
    // if (isset($_POST['referral'])) $referral = sanitizedString($con,$_POST['referral']);
?>
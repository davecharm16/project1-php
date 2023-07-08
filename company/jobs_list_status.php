<?php
    include("../dbcon.php");

    $status = $_POST['status'];
    $member_id = $_POST['member_id'];
    $job_id = $_POST['job_id'];
    $msg = "";

    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d H:i:s');

    $qry = mysqli_query($con,"SELECT * FROM applicants WHERE member_id = '$member_id' AND job_id = '$job_id'");

    if (mysqli_num_rows($qry) < 1) {
        $qry2 = mysqli_query($con,"INSERT INTO applicants (job_id,member_id,application_date,status) VALUES ('$job_id','$member_id','$date','$status')");
    }
    else {
        $qry2 = mysqli_query($con,"UPDATE applicants SET status = '$status' WHERE member_id = '$member_id' AND job_id = '$job_id'");
    }
 ?>

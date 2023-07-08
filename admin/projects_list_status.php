<?php
    include("../dbcon.php");

    $status = $_POST['status'];
    $member_id = $_POST['member_id'];
    $project_id = $_POST['project_id'];
    $msg = "";

    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d H:i:s');

    $qry = mysqli_query($con,"SELECT * FROM beneficiary WHERE member_id = '$member_id' AND project_id = '$project_id'");

    if (mysqli_num_rows($qry) < 1) {
        $qry2 = mysqli_query($con,"INSERT INTO beneficiary (project_id,member_id,application_date,status) VALUES ('$project_id','$member_id','$date','$status')");
    }
    else {
        $qry2 = mysqli_query($con,"UPDATE beneficiary SET status = '$status' WHERE member_id = '$member_id' AND project_id = '$project_id'");
    }
 ?>

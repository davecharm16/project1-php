<?php
    include("../dbcon.php");

    $status = $_POST['status'];
    $member_id = $_POST['member_id'];
    $training_id = $_POST['training_id'];
    $msg = "";

    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d H:i:s');

    $qry = mysqli_query($con,"SELECT * FROM enrolee WHERE member_id = '$member_id' AND training_id = '$training_id'");

    if (mysqli_num_rows($qry) < 1) {
        $qry2 = mysqli_query($con,"INSERT INTO enrolee (training_id,member_id,application_date,status) VALUES ('$training_id','$member_id','$date','$status')");
    }
    else {
        $qry2 = mysqli_query($con,"UPDATE enrolee SET status = '$status' WHERE member_id = '$member_id' AND training_id = '$training_id'");
    }
 ?>

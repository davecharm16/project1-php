<?php
    include("../dbcon.php");
    session_start();

    $username = $_SESSION['company_username'];
    date_default_timezone_set("Asia/Manila");
    $date = date("m/d/Y");
    $time = date("h:i:s a");
    $sql = "INSERT INTO user_logs (date,time,description) VALUES ('$date','$time','$username has logged out.')";
    $qry = mysqli_query($con,$sql);
    // die(mysqli_error($con));
    session_destroy();
    header("Location: ../index.php");
?>
<?php
    include("../dbcon.php");
    $id = $_GET['id'];

    $qry = mysqli_query($con,"DELETE FROM user_accounts WHERE id = '$id'");
    $qry2 = mysqli_query($con,"DELETE FROM user_info WHERE user_id = '$id'");
    $qry3 = mysqli_query($con,"DELETE FROM user_images WHERE user_id = '$id'");
    $msg = md5(3);
    echo "<script>window.location.replace('users.php?s=$msg')</script>";
?>
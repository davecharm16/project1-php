<?php
    include("../dbcon.php");
    $id = $_GET['id'];

    $sql = "SELECT eda_id FROM eda WHERE id = '$id'";
    $qry = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($qry);
    $eda_id = $row['eda_id'];

    $qry2 = mysqli_query($con,"DELETE FROM user_accounts WHERE username = '$eda_id'");
    $qry3 = mysqli_query($con,"DELETE FROM eda WHERE id = '$id'");
    $msg = md5(3);
    echo "<script>window.location.replace('members.php?s=$msg')</script>";
?>
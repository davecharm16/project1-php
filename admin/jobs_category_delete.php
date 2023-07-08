<?php
    include("../dbcon.php");
    $id = $_GET['id'];

    $qry = mysqli_query($con,"DELETE FROM jobs_category WHERE id = '$id'");
    $msg = md5(3);
    echo "<script>window.location.replace('jobs_category.php?s=$msg')</script>";
?>
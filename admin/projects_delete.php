<?php
    include("../dbcon.php");
    $id = $_GET['id'];

    $qry = mysqli_query($con,"DELETE FROM projects WHERE id = '$id'");
    $msg = md5(3);
    echo "<script>window.location.replace('projects.php?s=$msg')</script>";
?>
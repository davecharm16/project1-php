<?php
    include("../dbcon.php");

    $status = $_POST['status'];
    $training_id = $_POST['training_id'];
    $msg = "";

    $qry = mysqli_query($con,"UPDATE trainings SET status = '$status' WHERE id = '$training_id'");
 ?>

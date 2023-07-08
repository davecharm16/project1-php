<?php
    include("dbcon.php");
    $mode = $_POST['mode'];
    $job_id = $_POST['job_id'];
    $msg = "";
    if ($mode=='true') //mode is true when button is enabled 
    {
        $qry = mysqli_query($con,"UPDATE jobs SET status = 'show' WHERE id = '$job_id'");
        $msg = "SHOW SUCCESS";
    }
    else if ($mode=='false') 
    {
        $qry = mysqli_query($con,"UPDATE jobs SET status = 'hide' WHERE id = '$job_id'");
        $msg = "HIDE SUCCESS";
    }
 ?>

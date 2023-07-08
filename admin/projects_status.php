<?php
    include("../dbcon.php");

    $mode = $_POST['mode'];
    $project_id = $_POST['project_id'];
    $msg = "";

    if ($mode == 'true') //mode is true when button is enabled 
    {
        $qry = mysqli_query($con,"UPDATE projects SET status = 'show' WHERE id = '$project_id'");
    }
    else if ($mode == 'false') 
    {
        $qry = mysqli_query($con,"UPDATE projects SET status = 'hide' WHERE id = '$project_id'");
    }
 ?>
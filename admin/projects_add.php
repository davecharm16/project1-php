<?php
    include("../dbcon.php");
    $posted_by = $_GET['username'];
    $project_name = strtoupper(sanitizedString($con,$_POST['project_name']));
    $project_description = sanitizedString($con,$_POST['project_description']);
    $file_name = $_FILES['picture']['name'];
    $file_tmp = $_FILES['picture']['tmp_name'];
    $file_target = "../uploads/".$file_name;
    date_default_timezone_set("Asia/Manila");
    $posted_on = date("m/d/Y");

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"SELECT * FROM projects WHERE name = '$project_name'");
    if (mysqli_num_rows($qry) < 1) {
        if (move_uploaded_file($file_tmp,$file_target)) {
            $qry2 = mysqli_query($con,"INSERT INTO projects (name,description,fimage,posted_on,posted_by,updated_on,updated_by,status) VALUES ('$project_name','$project_description','$file_target','$posted_on','$posted_by','','','hide')");
            $msg = md5(1);
            echo "<script>window.location.replace('projects.php?s=$msg')</script>";
        }
        else{
            $msg = md5(4);
            echo "<script>window.location.replace('projects.php?s=$msg')</script>";
        }
    }
    else{
        $msg = md5(0);
        echo "<script>window.location.replace('projects.php?s=$msg')</script>";
        echo "$msg";
    }
?>
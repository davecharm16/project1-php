<?php
    include("../dbcon.php");
    $posted_by = $_GET['username'];
    $job_name = strtoupper(sanitizedString($con,$_POST['job_name']));
    $job_description = sanitizedString($con,$_POST['job_description']);
    $company = sanitizedString($con,$_POST['company']);
    $file_name = $_FILES['picture']['name'];
    $file_tmp = $_FILES['picture']['tmp_name'];
    $file_target = "../uploads/".$file_name;
    date_default_timezone_set("Asia/Manila");
    $posted_on = date("m/d/Y");

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"SELECT * FROM jobs WHERE name = '$job_name'");
    if (mysqli_num_rows($qry) < 1) {
        if (move_uploaded_file($file_tmp,$file_target)) {
            $qry2 = mysqli_query($con,"INSERT INTO jobs (name,description,company_id,fimage,posted_by,posted_on,updated_on,updated_by,status) VALUES ('$job_name','$job_description','$company','$file_target','$posted_by','$posted_on','','','hide')");
            
            $msg = md5(1);
            echo "<script>window.location.replace('jobs.php?s=$msg')</script>";
        }
        else{
            $msg = md5(4);
            echo "<script>window.location.replace('jobs.php?s=$msg')</script>";
        }
    }
    else{
        $msg = md5(0);
        echo "<script>window.location.replace('jobs.php?s=$msg')</script>";
        echo "$msg";
    }
?>
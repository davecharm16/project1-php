<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $username = $_GET['username'];
    $job_name = strtoupper(sanitizedString($con,$_POST['job_name']));
    $job_description = sanitizedString($con,$_POST['job_description']);
    $company = sanitizedString($con,$_POST['company']);
    $updated_on = date("m/d/Y");
    $status = sanitizedString($con,$_POST['status']);

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"UPDATE jobs SET name = '$job_name', description = '$job_description', company_id = '$company', status = '$status', updated_on = '$updated_on', updated_by = '$username' WHERE id = '$id'");
    $msg = md5(2);
    echo "<script>window.location.replace('jobs_edit.php?a=$id&s=$msg')</script>";
?>
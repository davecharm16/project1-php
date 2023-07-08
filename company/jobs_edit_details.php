<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $username = $_GET['username'];
    $job_name = strtoupper(sanitizedString($con,$_POST['job_name']));
    $job_description = sanitizedString($con,$_POST['job_description']);
    $job_category = $_POST['job_category'];
    $company = sanitizedString($con,$_POST['company']);
    $updated_on = date("m/d/Y");
    $status = sanitizedString($con,$_POST['status']);
    $job_category1 = implode(',', $job_category);
    $personal_domain = $_POST['personal_domain'];
    $personal_domain1 = implode(',', $personal_domain);
    $skills = $_POST['skills'];
    $skills1 = implode(',', $skills);
    $education = $_POST['education'];
    $education1 = implode(',', $education);

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    // die();
    $qry = mysqli_query($con,"UPDATE jobs SET name = '$job_name', description = '$job_description', company_id = '$company', status = '$status', category = '$job_category1', domain = '$personal_domain1', skills = '$skills1', education = '$education1', updated_on = '$updated_on', updated_by = '$username' WHERE id = '$id'");
    $msg = md5(2);
    echo "<script>window.location.replace('jobs_edit.php?a=$id&s=$msg')</script>";
?>
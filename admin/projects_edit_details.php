<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $username = $_GET['username'];
    $project_name = strtoupper(sanitizedString($con,$_POST['project_name']));
    $project_description = sanitizedString($con,$_POST['project_description']);
    $status = sanitizedString($con,$_POST['status']);
    $updated_on = date("m/d/Y");

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"UPDATE projects SET name = '$project_name', description = '$project_description', status = '$status', updated_on = '$updated_on', updated_by = '$username' WHERE id = '$id'");
    $msg = md5(2);
    echo "<script>window.location.replace('projects_edit.php?a=$id&s=$msg')</script>";
?>
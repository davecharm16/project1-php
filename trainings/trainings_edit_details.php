<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $username = $_GET['username'];
    $training_name = strtoupper(sanitizedString($con,$_POST['training_name']));
    $training_description = sanitizedString($con,$_POST['training_description']);
    $training_date = sanitizedString($con,$_POST['training_date']);
    $status = sanitizedString($con,$_POST['status']);
    $updated_on = date("m/d/Y");
    $trainDate = date("m/d/Y", strtotime($training_date));
    $training_category = $_POST['training_category'];
    $training_category1 = implode(',', $training_category);
    $training_skills = $_POST['training_skills'];
    $training_skills1 = implode(',', $training_skills);

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"UPDATE trainings SET name = '$training_name', description = '$training_description', training_date = '$trainDate', status = '$status', updated_on = '$updated_on', updated_by = '$username', category = '$training_category1', skills = '$training_skills1' WHERE id = '$id'");
    $msg = md5(2);
    echo "<script>window.location.replace('trainings_edit.php?a=$id&s=$msg')</script>";
?>
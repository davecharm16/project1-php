<?php
    include("../dbcon.php");
    $posted_by = $_GET['username'];
    $training_name = strtoupper(sanitizedString($con,$_POST['training_name']));
    $training_description = sanitizedString($con,$_POST['training_description']);
    $training_date = sanitizedString($con,$_POST['training_date']);
    $file_name = $_FILES['picture']['name'];
    $file_tmp = $_FILES['picture']['tmp_name'];
    $file_target = "../uploads/".$file_name;
    date_default_timezone_set("Asia/Manila");
    $posted_on = date("m/d/Y");
    $trainDate = date("m/d/Y", strtotime($training_date));
    $training_category = $_POST['training_category'];
    $training_category1 = implode(',', $training_category);
    $training_skills = $_POST['training_skills'];
    $training_skills1 = implode(',', $training_skills);

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"SELECT * FROM trainings WHERE name = '$training_name'");
    if (mysqli_num_rows($qry) < 1) {
        if (move_uploaded_file($file_tmp,$file_target)) {
            $qry2 = mysqli_query($con,"INSERT INTO trainings (name,description,fimage,training_date,posted_on,posted_by,updated_on,updated_by,status,category,skills) VALUES ('$training_name','$training_description','$file_target','$trainDate','$posted_on','$posted_by','','','open','$training_category1','$training_skills1')");
            $msg = md5(1);
            echo "<script>window.location.replace('trainings.php?s=$msg')</script>";
        }
        else{
            $msg = md5(4);
            echo "<script>window.location.replace('trainings.php?s=$msg')</script>";
        }
    }
    else{
        $msg = md5(0);
        echo "<script>window.location.replace('trainings.php?s=$msg')</script>";
        echo "$msg";
    }
?>
<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $file_name = $_FILES['picture']['name'];
    $file_tmp = $_FILES['picture']['tmp_name'];
    $file_target = "../uploads/".$file_name;

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    if (move_uploaded_file($file_tmp,$file_target)) {
        $qry = mysqli_query($con,"UPDATE user_images SET image = '$file_target' WHERE user_id = '$id'");
        $msg = md5(2);
        echo "<script>window.location.replace('users_edit.php?a=$id&s=$msg')</script>";
    }
    else{
        $msg = md5(4);
        echo "<script>window.location.replace('users_edit.php?a=$id&s=$msg')</script>";
    }
?>
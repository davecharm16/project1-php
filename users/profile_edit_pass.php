<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $new_pass = md5(sanitizedString($con,$_POST['new_pass']));
    $confirm_pass = md5(sanitizedString($con,$_POST['confirm_pass']));

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    if ($new_pass == $confirm_pass) {
        $qry = mysqli_query($con,"UPDATE user_accounts SET password = '$new_pass' WHERE id = '$id'");
        $msg = md5(2);
        echo "<script>window.location.replace('profile.php?s=$msg')</script>";
    }
    else{
        $msg = md5(4);
        echo "<script>window.location.replace('profile.php?s=$msg')</script>";
    }
    
?>
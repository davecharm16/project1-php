<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $username = sanitizedString($con,$_POST['username']);
    $new_pass = sanitizedString($con,$_POST['new_pass']);
    $confirm_pass = sanitizedString($con,$_POST['confirm_pass']);

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    if ($new_pass == '' && $confirm_pass == '') {
        $qry = mysqli_query($con,"UPDATE user_accounts SET username = '$username' WHERE id = '$id'");
        $msg = md5(2);
        echo "<script>window.location.replace('company_edit.php?a=$id&s=$msg')</script>";
    }
    else{
        if ($new_pass == $confirm_pass) {
            $new_pass = md5(sanitizedString($con,$_POST['new_pass']));
            $confirm_pass = md5(sanitizedString($con,$_POST['confirm_pass']));
            $qry = mysqli_query($con,"UPDATE user_accounts SET password = '$new_pass' WHERE id = '$id'");
            $msg = md5(2);
            echo "<script>window.location.replace('company_edit.php?a=$id&s=$msg')</script>";
        }
        else{
            $msg = md5(4);
            echo "<script>window.location.replace('company_edit.php?a=$id&s=$msg')</script>";
        }
    }
?>
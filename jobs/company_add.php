<?php
    include("../dbcon.php");
    $company_name = strtoupper(sanitizedString($con,$_POST['company_name']));
    $company_address = strtoupper(sanitizedString($con,$_POST['company_address']));
    $lastname = strtoupper(sanitizedString($con,$_POST['lastname']));
    $firstname = strtoupper(sanitizedString($con,$_POST['firstname']));
    $middlename = strtoupper(sanitizedString($con,$_POST['middlename']));
    $lastname = strtoupper(sanitizedString($con,$_POST['lastname']));
    $contact_no = sanitizedString($con,$_POST['contact_no']);
    $email_address = sanitizedString($con,$_POST['email_address']);
    $username = sanitizedString($con,$_POST['username']);
    $password = md5(sanitizedString($con,$_POST['password']));
    $file_name = $_FILES['picture']['name'];
    $file_tmp = $_FILES['picture']['tmp_name'];
    $file_target = "../uploads/".$file_name;

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"SELECT * FROM user_accounts WHERE username = '$username'");
    if (mysqli_num_rows($qry) < 1) {
        if (move_uploaded_file($file_tmp,$file_target)) {
            $qry2 = mysqli_query($con,"INSERT INTO user_accounts (username,password,user_type,isUpdated) VALUES ('$username','$password','COMPANY','0')");
            $qry3 = mysqli_query($con,"SELECT MAX(id) FROM user_accounts");
            $row3 = mysqli_fetch_array($qry3);
            $lastId = $row3['0'];
            $qry4 = mysqli_query($con,"INSERT INTO user_info (user_id,lastname,firstname,middlename,address,contact_no,email_address) VALUES ('$lastId','$lastname','$firstname','$middlename','$company_address','$contact_no','$email_address')");
            $qry5 = mysqli_query($con,"INSERT INTO user_images (user_id,image,isProfile) VALUES ('$lastId','$file_target','YES')");
            $qry6 = mysqli_query($con,"INSERT INTO company (user_id,company_name,company_address) VALUES ('$lastId','$company_name','$company_address')");
            $msg = md5(1);
            echo "<script>window.location.replace('company.php?s=$msg')</script>";
        }
        else{
            $msg = md5(4);
            echo "<script>window.location.replace('company.php?s=$msg')</script>";
        }
    }
    else{
        $msg = md5(0);
        echo "<script>window.location.replace('company.php?s=$msg')</script>";
        echo "$msg";
    }
?>
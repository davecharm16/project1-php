<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $company_name = strtoupper(sanitizedString($con,$_POST['company_name']));
    $company_address = strtoupper(sanitizedString($con,$_POST['company_address']));

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"UPDATE company SET company_name = '$company_name', company_address = '$company_address' WHERE user_id = '$id'");
    $msg = md5(2);
    echo "<script>window.location.replace('company_edit.php?a=$id&s=$msg')</script>";
?>
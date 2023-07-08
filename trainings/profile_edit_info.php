<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $lastname = strtoupper(sanitizedString($con,$_POST['lastname']));
    $firstname = strtoupper(sanitizedString($con,$_POST['firstname']));
    $middlename = strtoupper(sanitizedString($con,$_POST['middlename']));
    $lastname = strtoupper(sanitizedString($con,$_POST['lastname']));
    $address = strtoupper(sanitizedString($con,$_POST['address']));
    $contact_no = sanitizedString($con,$_POST['contact_no']);
    $email_address = sanitizedString($con,$_POST['email_address']);

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"UPDATE user_info SET lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', address = '$address', contact_no = '$contact_no', email_address = '$email_address' WHERE user_id = '$id'");
    $msg = md5(2);
    echo "<script>window.location.replace('profile.php?s=$msg')</script>";
?>
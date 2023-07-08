<?php
    include("../dbcon.php");
    $id = $_GET['id'];

    $firstname = strtoupper(sanitizedString($con,$_POST['firstname']));
    $middlename = strtoupper(sanitizedString($con,$_POST['middlename']));
    $lastname = strtoupper(sanitizedString($con,$_POST['lastname']));
    $birthdate = sanitizedString($con,$_POST['birthdate']);
    $gender = sanitizedString($con,$_POST['gender']);
    $address = strtoupper(sanitizedString($con,$_POST['address']));
    $contact_no = sanitizedString($con,$_POST['contact_no']);
    $email_address = sanitizedString($con,$_POST['email_address']);
    $username = sanitizedString($con,$_POST['username']);
    $password = sanitizedString($con,$_POST['password']);
    
    if ($password != '') {
        $sql2 = "UPDATE user_accounts SET password = '".md5($password)."', isUpdated = '1' WHERE username = '$username'";
        $qry2 = mysqli_query($con,$sql2);
    }

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    $sql = "UPDATE eda SET
                lastname = '$lastname', firstname = '$firstname',
                middlename = '$middlename', birthdate = '$birthdate',
                gender = '$gender', address = '$address',
                contact_no = '$contact_no', email_address = '$email_address'
            WHERE id = '$id'
    ";
    $qry = mysqli_query($con,$sql) or die(mysqli_error($con));
    $msg = md5(2);

    // die("UPDATE members SET fullname = '$fullname', age = '$age', gender = '$sex', civil_status = '$civil_status', educational_attainment = '$educational_attainment', work_status = '$work_status', seminar_attended = '$seminar_attended', drug_type = '$drug_type', rehab_no = '$rehab_no' WHERE id = '$id'");
    echo "<script>window.location.replace('members_edit.php?a=$id&s=$msg')</script>";
?>
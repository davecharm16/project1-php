<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $lastname = strtoupper(sanitizedString($con,$_POST['lastname']));
    $firstname = strtoupper(sanitizedString($con,$_POST['firstname']));
    $middlename = strtoupper(sanitizedString($con,$_POST['middlename']));
    $birthdate = sanitizedString($con,$_POST['birthdate']);
    $contact_no = sanitizedString($con,$_POST['contact_no']);
    $email_address = sanitizedString($con,$_POST['email_address']);
    $gender = sanitizedString($con,$_POST['gender']);
    $address = strtoupper(sanitizedString($con,$_POST['address']));
    
    if (isset($_POST['education'])) $education = sanitizedString($con,$_POST['education']);
    if (isset($_POST['previous_job']))  $previous_job = sanitizedString($con,$_POST['previous_job']);
    if (isset($_POST['trainings_attended'])) $trainings_attended = sanitizedString($con,$_POST['trainings_attended']);
    if (isset($_POST['four_p'])) $four_p = sanitizedString($con,$_POST['four_p']);
    if (isset($_POST['referral'])) $referral = sanitizedString($con,$_POST['referral']);

    $skill_list = array();
    foreach($_POST['skill_list'] as $val) {
        $skill_list[] = $val;
    }
    $skill_list = implode(',', $skill_list);

    $drug_list = array();
    foreach($_POST['drug_list'] as $val) {
        $drug_list[] = $val;
    }
    $drug_list = implode(',', $drug_list);

    // echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$contact_no<br>$gender<br>$education<br>$previous_job<br>$skill_list<br>$trainings_attended<br>$drug_list<br>$four_p<br>$referral";
    // die();
    $sql = "UPDATE eda SET
                lastname = '$lastname', firstname = '$firstname', middlename = '$middlename',
                birthdate = '$birthdate', gender = '$gender', address = '$address',
                contact_no = '$contact_no', email_address = '$email_address', education = '$education',
                previous_job = '$previous_job', skills = '$skill_list', trainings_attended = '$trainings_attended',
                drug_type = '$drug_list', four_p = '$four_p', referral = '$referral'
            WHERE eda_id = '$id'
    ";
    $qry = mysqli_query($con,$sql) or die(mysqli_error($con));
    $msg = md5(2);

    // die("UPDATE members SET fullname = '$fullname', age = '$age', gender = '$sex', civil_status = '$civil_status', educational_attainment = '$educational_attainment', work_status = '$work_status', seminar_attended = '$seminar_attended', drug_type = '$drug_type', rehab_no = '$rehab_no' WHERE id = '$id'");
    echo "<script>window.location.replace('info.php?s=$msg')</script>";
?>
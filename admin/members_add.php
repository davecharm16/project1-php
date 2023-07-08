<?php
    include("../dbcon.php");
    //OLD PROCESS
        // $fullname = strtoupper(sanitizedString($con,$_POST['fullname']));
        // $age = sanitizedString($con,$_POST['age']);
        // $sex = sanitizedString($con,$_POST['sex']);
        // $civil_status = sanitizedString($con,$_POST['civil_status']);
        // $educational_attainment = sanitizedString($con,$_POST['educational_attainment']);
        // $work_status = sanitizedString($con,$_POST['work_status']);
        // $seminar_attended = sanitizedString($con,$_POST['seminar_attended']);
        // $drug_type = sanitizedString($con,$_POST['drug_type']);
        // $rehab_no = sanitizedString($con,$_POST['rehab_no']);

        // //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
        
        // $qry = mysqli_query($con,"SELECT * FROM members WHERE fullname = '$fullname'");
        // if (mysqli_num_rows($qry) < 1) {
        //     $qry2 = mysqli_query($con,"INSERT INTO members (fullname,age,gender,civil_status,educational_attainment,work_status,seminar_attended,drug_type,rehab_no) VALUES ('$fullname','$age','$sex','$civil_status','$educational_attainment','$work_status','$seminar_attended','$drug_type','$rehab_no')");
        //     $msg = md5(1);
        //     echo "<script>window.location.replace('members.php?s=$msg')</script>";
        // }
        // else{
        //     $msg = md5(0);
        //     echo "<script>window.location.replace('members.php?s=$msg')</script>";
        //     // echo "$msg";
        // }
    //

    //NEW PROCESS
        if (isset($_POST['submit'])) {
            $firstname = strtoupper(sanitizedString($con,$_POST['firstname']));
            $middlename = strtoupper(sanitizedString($con,$_POST['middlename']));
            $lastname = strtoupper(sanitizedString($con,$_POST['lastname']));
            $birthdate = sanitizedString($con,$_POST['birthdate']);
            $gender = sanitizedString($con,$_POST['gender']);
            $address = strtoupper(sanitizedString($con,$_POST['address']));
            $contact_no = sanitizedString($con,$_POST['contact_no']);
            $email_address = sanitizedString($con,$_POST['email_address']);

            $qry = mysqli_query($con,"SELECT * FROM eda WHERE lastname = '$lastname' AND firstname = '$firstname' AND birthdate = '$birthdate'");
            if (mysqli_num_rows($qry) > 0) {
                $msg = md5(0);
                echo "<script>window.location.replace('members.php?s=$msg')</script>";
            }
            else{
                $sql2 = "INSERT INTO eda
                        (
                            lastname, firstname, middlename,
                            birthdate, gender, address,
                            contact_no, email_address
                        ) VALUES
                        (
                           '$lastname','$firstname','$middlename',
                           '$birthdate','$gender','$address',
                           '$contact_no','$email_address'
                        )
                ";
                $qry2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
                $lastId = mysqli_insert_id($con);
                $username = "EDA-$lastId";
                $password = md5("EDA-$lastId");

                $sql3 = "INSERT INTO user_accounts (username,password,user_type,isUpdated) VALUES ('$username','$password','USER','0')";
                $qry3 = mysqli_query($con,$sql3) or die(mysqli_error($con));

                $sql4 = "UPDATE eda SET eda_id = '$username' WHERE id = '$lastId'";
                $qry4 = mysqli_query($con,$sql4) or die(mysqli_error($con));
                $msg = md5(1);
                // echo "$sql2";
                echo "<script>window.location.replace('members.php?s=$msg')</script>";
            }
        }
    //
?>
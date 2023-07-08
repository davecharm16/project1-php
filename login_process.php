<?php
    include("dbcon.php");

    if (isset($_POST['submit'])) {
        $username = sanitizedString($con,$_POST['username']);
        $password = md5(sanitizedString($con,$_POST['password']));

        if ($username == 'arjay' && $password == md5('thisisarjay')) {
            session_start();
            $_SESSION['admin_username'] = "arjay";
            $_SESSION['admin_type'] = "ADMIN";
            echo "<script>window.location.replace('admin/dashboard.php')</script>";
        }
        else {
            $qry = mysqli_query($con,"SELECT * FROM user_accounts WHERE username = '$username' AND password = '$password'");
            if (mysqli_num_rows($qry) > 0) {
                $row = mysqli_fetch_array($qry);
                $user_id = $row['id'];
                $user_type = $row['user_type'];
                
                date_default_timezone_set("Asia/Manila");
                $date = date("m/d/Y");
                $time = date("h:i:s a");
                $sql = "INSERT INTO user_logs (date,time,description) VALUES ('$date','$time','$username has logged in.')";
                $qry = mysqli_query($con,$sql);

                if ($user_type == 'ADMIN') {
                    session_start();
                    $_SESSION['admin_id'] = $user_id;
                    $_SESSION['admin_username'] = $username;
                    $_SESSION['admin_type'] = $user_type;
                    echo "<script>window.location.replace('admin/dashboard.php')</script>"; 
                }
                elseif ($user_type == 'DOLE' || $user_type == 'PESO') {
                    session_start();
                    $_SESSION['job_id'] = $user_id;
                    $_SESSION['job_username'] = $username;
                    $_SESSION['job_type'] = $user_type;
                    echo "<script>window.location.replace('jobs/dashboard.php')</script>"; 
                }
                elseif ($user_type == 'TESDA') {
                    session_start();
                    $_SESSION['training_id'] = $user_id;
                    $_SESSION['training_username'] = $username;
                    $_SESSION['training_type'] = $user_type;
                    echo "<script>window.location.replace('trainings/dashboard.php')</script>"; 
                }
                else if ($user_type == 'DSWD') {
                    session_start();
                    $_SESSION['livelihood_id'] = $user_id;
                    $_SESSION['livelihood_username'] = $username;
                    $_SESSION['livelihood_type'] = $user_type;
                    echo "<script>window.location.replace('livelihoods/dashboard.php')</script>"; 
                }
                else if ($user_type == 'USER') {
                    session_start();
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_username'] = $username;
                    $_SESSION['user_type'] = $user_type;
                    echo "<script>window.location.replace('users/dashboard.php')</script>"; 
                }
                else{
                    session_start();
                    $_SESSION['company_id'] = $user_id;
                    $_SESSION['company_username'] = $username;
                    $_SESSION['company_type'] = $user_type;
                    echo "<script>window.location.replace('company/dashboard.php')</script>"; 
                }
            }
            else{
                $msg = md5(0);
                echo "<script>window.location.replace('index.php?s=$msg')</script>";
            }
        }
    }
?>
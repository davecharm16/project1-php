<?php
    session_start();
    if (!empty($_SESSION['admin_session'])){ header("Location: admin/dashboard.php"); }
    include("dbcon.php");
    $qry = mysqli_query($con,"SELECT * FROM user_accounts WHERE user_type = 'ADMIN'");
    if (mysqli_num_rows($qry) < 1) {
        $qry2 = mysqli_query($con,"INSERT INTO user_accounts (username,password,user_type,isUpdated) VALUES ('admin',md5('admin'),'ADMIN','1')");
        $lastId = mysqli_insert_id($con);
        $qry3 = mysqli_query($con,"INSERT INTO user_info (user_id,lastname,firstname,middlename,address,contact_no,email_address) VALUES ('$lastId','DELA CRUZ','JUAN','MAKABAYAN','','','');");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DOH-DTRC | ADSS</title>
    <link rel="icon" href="assets/doh.png" type="image/png" sizes="16x16">   
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="assets/banner.png" alt="System Logo" width="95%">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="login_process.php">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success btn-block btn-flat" name="submit">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <?php 
                if (isset($_GET['s'])) {
                    $s = $_GET['s'];
            ?>
            <br>
            <div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-info-circle"></i> Alert!</h4>
                Account does not exists.
            </div>
            <?php
                }
            ?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>
</html>

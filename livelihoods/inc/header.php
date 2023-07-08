<?php
    session_start();
    if (empty($_SESSION['livelihood_username']) || $_SESSION['livelihood_type'] != 'DSWD') {
        header("Location: ../index.php");
    }
    include("../dbcon.php");
    $user_id = $_SESSION['livelihood_id'];
    $username = $_SESSION['livelihood_username'];
    $user_type = $_SESSION['livelihood_type'];

    $qry = mysqli_query($con,"SELECT * FROM user_info WHERE user_id = '$user_id'");
    $row = mysqli_fetch_array($qry);
    $lastname = $row['lastname'];
    $firstname = $row['firstname'];
    $middlename = $row['middlename'];
    $address = $row['address'];
    $contact_no = $row['contact_no'];
    $email_address = $row['email_address'];

    $qry2 = mysqli_query($con,"SELECT * FROM user_images WHERE user_id = '$user_id'");
    $row2 = mysqli_fetch_array($qry2);
    $image = $row2['image'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DOH-DTRC | ADSS</title>
    <link rel="icon" href="../assets/doh.png" type="image/png" sizes="16x16">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Bootstrap Toggle -->
    <link rel="stylesheet" href="../bootstrap-toggle-master/css/bootstrap-toggle.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="dashboard.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="../assets/doh.png" width="100%" alt="Brand Logo"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="../assets/banner.png" width="100%" alt="Brand Logo"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- <img src="../assets/admin.jpeg" class="user-image" alt="User Image"> -->
                            <span class="hidden-xs"><?php echo "Hello, $firstname"; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $image; ?>" class="img-circle" alt="User Image">

                                <p>
                                <?php echo "$lastname, $firstname"; ?>
                                <!-- <br>Web Developer -->
                                <small><?php echo "$user_type"; ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                <a href="profile.php" class="btn btn-default btn-flat btn-sm">My Profile</a>
                                </div>
                                <div class="pull-right">
                                <a href="logout.php" class="btn btn-default btn-flat btn-sm">Sign out</a>
                                </div>
                            </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <?php include("nav.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
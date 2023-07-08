<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $q1 = sanitizedString($con,$_POST['q1']);
    $q2 = sanitizedString($con,$_POST['q2']);
    $q3 = sanitizedString($con,$_POST['q3']);
    $q4 = sanitizedString($con,$_POST['q4']);
    $q5 = sanitizedString($con,$_POST['q5']);
    $q6 = sanitizedString($con,$_POST['q6']);
    $q7 = sanitizedString($con,$_POST['q7']);
    $q8 = sanitizedString($con,$_POST['q8']);
    $q9 = sanitizedString($con,$_POST['q9']);
    $q10 = sanitizedString($con,$_POST['q10']);

    date_default_timezone_set("Asia/Manila");
    $created_on = date("m/d/Y");
    
    // if (isset($_POST['education'])) $education = sanitizedString($con,$_POST['education']);
    // if (isset($_POST['previous_job']))  $previous_job = sanitizedString($con,$_POST['previous_job']);
    // if (isset($_POST['trainings_attended'])) $trainings_attended = sanitizedString($con,$_POST['trainings_attended']);
    // if (isset($_POST['four_p'])) $four_p = sanitizedString($con,$_POST['four_p']);
    // if (isset($_POST['referral'])) $referral = sanitizedString($con,$_POST['referral']);

    $interest_list = array();
    foreach($_POST['interest_list'] as $val) {
        $interest_list[] = $val;
    }
    $interest_list = implode(',', $interest_list);

    $domain1 = ($q1 + $q6) / 2;
    $domain2 = ($q7 + $q2) / 2;
    $domain3 = ($q3 + $q8) / 2;
    $domain4 = ($q9 + $q4) / 2;
    $domain5 = ($q5 + $q10) / 2;

    $sql2 = "SELECT * FROM eda_answers WHERE eda_id = '$id'";
    $qry2 = mysqli_query($con,$sql2);

    if (mysqli_num_rows($qry2) < 1) {
        // echo "$id<br>$q1<br>$q2<br>$q3<br>$q4<br>$q5<br>$q6<br>$q7<br>$q8<br>$q9<br>$q10<br>$interest_list<br>$domain1<br>$domain2<br>$domain3<br>$domain4<br>$domain5";
        // die();
        $sql = "INSERT INTO eda_answers (eda_id,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,domain1,domain2,domain3,domain4,domain5,interests,created_on) VALUES ('$id','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$domain1','$domain2','$domain3','$domain4','$domain5','$interest_list','$created_on')";
        $qry = mysqli_query($con,$sql) or die(mysqli_error($con));
        $msg = md5(1);
        
        echo "<script>window.location.replace('pi.php?s=$msg')</script>";
    }
    else {
        // echo "$id<br>$q1<br>$q2<br>$q3<br>$q4<br>$q5<br>$q6<br>$q7<br>$q8<br>$q9<br>$q10<br>$interest_list<br>$domain1<br>$domain2<br>$domain3<br>$domain4<br>$domain5";
        // die();
        $sql = "UPDATE eda_answers SET q1='$q1',q2='$q2',q3='$q3',q4='$q4',q5='$q5',q6='$q6',q7='$q7',q8='$q8',q9='$q9',q10='$q10',domain1='$domain1',domain2='$domain2',domain3='$domain3',domain4='$domain4',domain5='$domain5',interests='$interest_list' WHERE eda_id = '$id'";
        $qry = mysqli_query($con,$sql) or die(mysqli_error($con));
        $msg = md5(2);

        echo "<script>window.location.replace('pi.php?s=$msg')</script>";
    }
?>
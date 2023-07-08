<?php
    include("../dbcon.php");

    $status = $_POST['status'];
    $member_id = $_POST['member_id'];
    $training_id = $_POST['training_id'];
    $msg = "";

    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d H:i:s');

    if ($status == 'C') {
        $sql2 = "SELECT * FROM trainings WHERE id = '$training_id'";
        $qry2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_array($qry2);
        $skills = $row2['skills'];
        $splitSkills = explode(",",$skills);

        $sql2 = "SELECT * FROM eda WHERE eda_id = '$member_id'";
        $qry2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_array($qry2);
        $eda_skills = $row2['skills'];
        $splitEdaSkills = explode(",",$eda_skills);

        foreach ($splitSkills as $skills1) {
            if (in_array($skills1,$splitEdaSkills)) {
                continue;
            }
            else{
                $eda_skills .= ",$skills1";
            }
        }

        // print_r($splitEdaSkills);
        // echo "$eda_skills";
        $qry3 = mysqli_query($con,"UPDATE eda SET skills = '$eda_skills' WHERE eda_id = '$member_id'");
    }
    // die();

    $qry = mysqli_query($con,"SELECT * FROM enrolee WHERE member_id = '$member_id' AND training_id = '$training_id'");
    

    if (mysqli_num_rows($qry) < 1) {
        $qry2 = mysqli_query($con,"INSERT INTO enrolee (training_id,member_id,application_date,status) VALUES ('$training_id','$member_id','$date','$status')");
    }
    else {
        $qry2 = mysqli_query($con,"UPDATE enrolee SET status = '$status' WHERE member_id = '$member_id' AND training_id = '$training_id'");
    }
 ?>

<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    if (isset($_POST['a1'])) $a1 = "A";
    else $a1 = "B";
    if (isset($_POST['a2'])) $a2 = "A";
    else $a2 = "B";
    if (isset($_POST['a3'])) $a3 = "A";
    else $a3 = "B";
    if (isset($_POST['a4'])) $a4 = "A";
    else $a4 = "B";
    if (isset($_POST['a5'])) $a5 = "A";
    else $a5 = "B";
    if (isset($_POST['a6'])) $a6 = "A";
    else $a6 = "B";
    if (isset($_POST['a7'])) $a7 = "A";
    else $a7 = "B";
    if (isset($_POST['a8'])) $a8 = "A";
    else $a8 = "B";
    if (isset($_POST['b1'])) $b1 = "A";
    else $b1 = "B";
    if (isset($_POST['b2'])) $b2 = "A";
    else $b2 = "B";
    if (isset($_POST['b3'])) $b3 = "A";
    else $b3 = "B";
    if (isset($_POST['b4'])) $b4 = "A";
    else $b4 = "B";
    if (isset($_POST['b5'])) $b5 = "A";
    else $b5 = "B";
    if (isset($_POST['b6'])) $b6 = "A";
    else $b6 = "B";
    if (isset($_POST['b7'])) $b7 = "A";
    else $b7 = "B";
    if (isset($_POST['c1'])) $c1 = "A";
    else $c1 = "B";
    if (isset($_POST['c2'])) $c2 = "A";
    else $c2 = "B";
    if (isset($_POST['c3'])) $c3 = "A";
    else $c3 = "B";
    if (isset($_POST['c4'])) $c4 = "A";
    else $c4 = "B";
    if (isset($_POST['c5'])) $c5 = "A";
    else $c5 = "B";
    if (isset($_POST['c6'])) $c6 = "A";
    else $c6 = "B";
    if (isset($_POST['d1'])) $d1 = "A";
    else $d1 = "B";
    if (isset($_POST['d2'])) $d2 = "A";
    else $d2 = "B";
    if (isset($_POST['d3'])) $d3 = "A";
    else $d3 = "B";
    if (isset($_POST['d4'])) $d4 = "A";
    else $d4 = "B";
    if (isset($_POST['d5'])) $d5 = "A";
    else $d5 = "B";
    if (isset($_POST['d6'])) $d6 = "A";
    else $d6 = "B";
    // echo "$a1 _ $a2 _ $a3 _ $a4 _ $a5 _ $a6 _ $a7 _ $a8 _ $b1 _ $b2 _ $b3 _ $b4 _ $b5 _ $b6 _ $b7 _ $c1 _ $c2 _ $c2 _ $c3 _ $c4 _ $c5 _ $c6";
    
    $qry = mysqli_query($con,"SELECT * FROM member_qualifications WHERE member_id = '$id'");

    if (mysqli_num_rows($qry) < 1) {
        $qry2 = mysqli_query($con,"INSERT INTO member_qualifications (member_id,a1,a2,a3,a4,a5,a6,a7,a8,b1,b2,b3,b4,b5,b6,b7,c1,c2,c3,c4,c5,c6,d1,d2,d3,d4,d5,d6) VALUES ('$id','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$b1','$b2','$b3','$b4','$b5','$b6','$b7','$c1','$c2','$c3','$c4','$c5','$c6','$d1','$d2','$d3','$d4','$d5','$d6')");
        $msg = md5(2);

        echo "<script>window.location.replace('members.php?s=$msg')</script>";
    }
    else {
        $qry2 = mysqli_query($con,"UPDATE member_qualifications SET a1 = '$a1',a2 = '$a2',a3 = '$a3',a4 = '$a4',a5 = '$a5',a6 = '$a6',a7 = '$a7',a8 = '$a8',b1 = '$b1',b2 = '$b2',b3 = '$b3',b4 = '$b4',b5 = '$b5',b6 = '$b6',b7 = '$b7',c1 = '$c1',c2 = '$c2',c3 = '$c3',c4 = '$c4',c5 = '$c5',c6 = '$c6',d1 = '$d1',d2 = '$d2',d3 = '$d3',d4 = '$d4',d5 = '$d5',d6 = '$d6' WHERE member_id = '$id'");
        $msg = md5(2);
    
        echo "<script>window.location.replace('members.php?s=$msg')</script>";
    }
?>
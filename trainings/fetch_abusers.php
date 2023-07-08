<?php
    include('../dbcon.php');

    if (isset($_POST['sql'])) {
        $sql = $_POST['sql'];
        $response = "<ul style='font-size: 15px'>";
        // echo "$sql";
        $qry = mysqli_query($con,$sql) or die(mysqli_error($con));
        if (mysqli_num_rows($qry) < 1) {
            echo "<h5 style='font-size: 15px'>No record found.</h5>";
        }
        else {
            while ($row = mysqli_fetch_array($qry)) {
                $member_id = $row['member_id'];
                $fullname = "";
                $sql2 = "SELECT * FROM members1 WHERE id = '$member_id'";
                $qry2 = mysqli_query($con,$sql2);
                while ($row2 = mysqli_fetch_array($qry2)) {
                    $fullname = $row2['fullname'];
                }
                $response .= "<li>$fullname</li>";
            }
            $response .= "</ul>";
            echo "$response";
        }
    }
    else{
        header('Location: report_one.php');
    }
?>
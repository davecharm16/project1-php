<?php
    include("../dbcon.php");
    $category_name = strtoupper(sanitizedString($con,$_POST['category_name']));

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"SELECT * FROM trainings_category WHERE category_name = '$category_name'");
    if (mysqli_num_rows($qry) < 1) {
        $qry2 = mysqli_query($con,"INSERT INTO trainings_category (category_name) VALUES ('$category_name')");
        
        $msg = md5(1);
        echo "<script>window.location.replace('trainings_category.php?s=$msg')</script>";
    }
    else{
        $msg = md5(0);
        echo "<script>window.location.replace('trainings_category.php?s=$msg')</script>";
        echo "$msg";
    }
?>
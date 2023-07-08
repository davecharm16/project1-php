<?php
    include("../dbcon.php");
    $id = $_GET['id'];
    $category_name = strtoupper(sanitizedString($con,$_POST['category_name']));

    //echo "$lastname<br>$firstname<br>$middlename<br>$address<br>$contact_no<br>$email_address<br>$username<br>$password<br>$user_type<br>$file_name<br>$file_tmp";
    
    $qry = mysqli_query($con,"UPDATE trainings_category SET category_name = '$category_name' WHERE id = '$id'");
    $msg = md5(2);
    echo "<script>window.location.replace('trainings_category_edit.php?a=$id&s=$msg')</script>";
?>
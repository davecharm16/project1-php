<?php
    $hostName = "localhost";
    $hostUsername = "root";
    $hostPassword = "";
    $hostDb = "db_project1";

    $con = mysqli_connect($hostName,$hostUsername,$hostPassword,$hostDb);

    function sanitizedString($conn,$value){
        $stringValue = htmlspecialchars(trim($value));
        $stringValue = mysqli_escape_string($conn,$stringValue);

        return $stringValue;
    }
?>
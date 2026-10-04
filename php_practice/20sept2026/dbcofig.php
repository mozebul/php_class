<?php
    // Connection with mySQL
    $host = "localhost";
    $user =  "root";
    $pass = "";
    $db = "php_practice";

    //$conn = mysqli_connect($host, $user, $pass, $db);
    $conn = new mysqli($host, $user, $pass, $db);

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
     } 
    //else {
    //     echo "OK";
    // }
?>
<?php
    
    date_default_timezone_set('Asia/Bangkok');

    $host = "127.0.0.1";
    $user = "root";
    $pass = "12345678";
    $db = "PHP_POS";

    $conn = new mysqli($host, $user, $pass, $db);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    mysqli_query($conn, "SET NAMES 'utf8' ");
    ob_start();

    
?>

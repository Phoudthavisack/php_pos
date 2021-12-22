<?php
    include('session.php');
    if($_SESSION['level'] != "admin"){
        header("Location:index.php");
        die;
    }
?>
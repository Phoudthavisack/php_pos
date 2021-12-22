<?php
//
include('session_admin.php');
include("config.php");

$id = $_GET['id'];

$sql = "DELETE FROM member WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("location:member.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
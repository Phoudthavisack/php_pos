<?php
//
include('session_admin.php');
include("config.php");

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("location:products.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
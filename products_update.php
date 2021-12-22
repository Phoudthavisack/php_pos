<?php
//
include('session_admin.php');
include("config.php");

$id = $_GET['id'];
$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$instock = $_POST["instock"];
$image = "";

if($_FILES["image"]["name"] != ""){
// upload image
$target_dir = "products_image/";
// rename file
$temp = explode(".", $_FILES["image"]["name"]);
$rename = date("YmdHis"). '.' . end($temp);
//
$target_file = $target_dir . $rename;
$image = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
       
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file \"". $target_file . "\" has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}
// ------------------------- //

if($name != ""){
    if($image != ""){
        $sql = "UPDATE products SET name='$name',description='$description',price='$price',instock='$instock',image='$image' WHERE id=$id";
    }else{
        $sql = "UPDATE products SET name='$name',description='$description',price='$price',instock='$instock' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("location:products.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}else{
    echo "<script>window.history.back();</script>";
    header("location:products.php");
}
?>
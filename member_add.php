<?php
 include('session_admin.php');
include("config.php");

$firstname = $_POST["firstname"];
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$level = $_POST["level"];
$image = "";


// upload image

$target_dir = "member_image/";
// rename file
if(isset($_FILES["image"]["name"])){

$temp = explode(".", $_FILES["image"]["name"]);
$rename = "$username".date("YmdHis"). '.' . end($temp);
// 
$target_file = $target_dir . $rename;
$image = $target_file;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if($_FILES["image"]["tmp_name"] != "") {
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

// ----------------- //

if($name != "" ){

    $sql = "INSERT INTO member (firstname,name,lastname,username,password,email,phone,address,level,image)
    VALUES ('$firstname','$name','$lastname','$username','$password','$email','$phone','$address','$level','$image')";

    if ($conn->query($sql) === TRUE) {
        header("location:member.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    header("location:member.php");
}
?>
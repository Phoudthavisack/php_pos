<?php

session_start();

if(isset($_SESSION['login'])){
    header("Location:index.php");
    die;
}

include('config.php');

if(isset($_GET['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM member WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['login'] = true;
        $_SESSION['name'] = $row['name'];
        $_SESSION['level'] = $row['level'];
        echo "<script>alert('login')</script>";
        header("Location:index.php");
    }
    echo "<script>alert('Username and password do not match!')</script>";
}
?>


<form action="?login" method="post" style="display:grid;width: 200px;height:100px;grid-gap:10px;">
    <input type="text"name="username" placeholder="username"/>
    <input type="password" name="password" placeholder="password"/>
    <button>Login</button>
</form>
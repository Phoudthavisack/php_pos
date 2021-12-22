<?php
    include('session.php');
    if($_SESSION['level'] != "admin"){
        header("Location:index.php");
        die;
    }
    include('config.php');
?>
<form action="member_add.php" method="post" enctype="multipart/form-data">
    <label for="firstname">firstname</label>
    <input type="text" id="firstname" name="firstname"/><br>
    <label for="name">name</label>
    <input type="text" id="name" name="name"/><br>
    <label for="lastname">lastname</label>
    <input type="text" id="lastname" name="lastname"/><br>
    <label for="username">username</label>
    <input type="text" id="username" name="username"/><br>
    <label for="password">password</label>
    <input type="password" id="password" name="password"/><br>
    <label for="email">email</label>
    <input type="email" id="email" name="email"/><br>
    <label for="phone">phone</label>
    <input type="number" id="phone" name="phone"/><br>
    <label for="address">address</label><br>
    <textarea name="address" id="address" cols="30" rows="10"></textarea><br>
    <div>
        <input type="radio" id="staff" name="level" value="staff" checked/>
        <label for="staff">staff</label><br>
        <input type="radio" id="admin" name="level" value="admin"/>
        <label for="admin">admin</label><br>
    </div><br>
    <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg"/>
    <button type="submit">add member</button>
</form>
<style>
table{
    width:600px;
    border-collapse: collapse;
}
table, th, td {
    border:1px solid black;
}
</style>
<table>
        <tr>
            <th>name</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>level</th>
            <th>image</th>
            <th>tool</th>
        </tr>
<?php
$sql = "SELECT * FROM member";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()):
?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['level']; ?></td>
        <td><?php echo $row['image']; ?></td>
        <td>
            <a href="member_edit.php?id=<?php echo $row['id'] ?>">edit</a>
            <a href="member_delete.php?id=<?php echo $row['id'] ?>">delete</a>
        </td>
    </tr>
<?php
endwhile;
?>
</table>
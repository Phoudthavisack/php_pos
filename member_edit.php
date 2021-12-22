<?php
    include('config.php');

    if(!isset($_GET['id'])){
        header("Location:member.php");
        die;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM member WHERE id=$id";

    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()):
?>
<form action="member_update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <label for="firstname">firstname</label>
    <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']?>"/><br>
    <label for="name">name</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']?>"/><br>
    <label for="lastname">lastname</label>
    <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']?>"/><br>
    <label for="email">email</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']?>"/><br>
    <label for="phone">phone</label>
    <input type="number" id="phone" name="phone" value="<?php echo $row['phone']?>"/><br>
    <label for="address">address</label><br>
    <textarea name="address" id="address" cols="30" rows="10"><?php echo $row['address']?></textarea><br>
    <div>
        <input type="radio" id="staff" name="level" value="staff" <?php if($row['level'] == 'staff'){echo "checked";} ?>/>
        <label for="staff">staff</label><br>
        <input type="radio" id="admin" name="level" value="admin" <?php if($row['level'] == 'admin'){echo "checked";} ?>/>
        <label for="admin">admin</label><br>
    </div><br>
    <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg"/>
    <button type="submit">update</button>
</form>
<?php
    else:
        header('Location:member.php');
    endif;
?>
<?php

if(isset($_FILES["upload"]["tmp_name"])){
move_uploaded_file($_FILES["upload"]["tmp_name"], $_FILES["upload"]["tmp_name"]);
}

?>

<form action="" method="post">
    <input type="file" name="upload"/>
    <button type="submit">submit</button>
</form>
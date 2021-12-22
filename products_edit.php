<?php
 include('session_admin.php');
include("config.php");

$id = $_GET["id"];
$sql = "SELECT * FROM products WHERE id=$id";

$result = $conn->query($sql);

if($row = $result->fetch_assoc()):
?>

<form action="products_update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" style="display:grid;width: 300px;grid-gap:10px">
    <input type="text" name="name" placeholder="name" style="height: 30px;" value="<?php echo $row["name"] ?>"/>
    <input type="number" name="price" placeholder="price" style="height: 30px;"  value="<?php echo $row["price"] ?>"/>
    <input type="number" name="instock" placeholder="instock" style="height: 30px;" value="<?php echo $row["instock"] ?>"/>
    <div>
        <label for="file">ເລືອກຮູບເພື່ອປ່ຽນ</label>
        <input type="file" id="file" name="image" id="image" accept="image/png, image/gif, image/jpeg"/>
    </div>
    <textarea name="description" cols="30" rows="10" placeholder="description"><?php echo $row["description"] ?></textarea>
    <button type="submit">update</button>
</form>

<?php
else:
    header("location:products.php");
endif;
?>
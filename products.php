<?php
    include('session_admin.php');
    include("config.php");
?>

<form action="products_add.php" method="post" enctype="multipart/form-data" style="display:grid;width: 300px;grid-gap:10px">
    <input type="text" name="name" placeholder="name" style="height: 30px;"/>
    <input type="number" name="price" placeholder="price" style="height: 30px;"/>
    <input type="number" name="instock" placeholder="instock" style="height: 30px;"/>
    <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg"/>
    <textarea name="description" cols="30" rows="10" placeholder="description"></textarea>
    <button type="submit">add product</button>
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
        <th>image</th>
        <th>name</th>
        <th>description</th>
        <th>instock</th>
        <th>price</th>
        <th>tool</th>
    </tr>
        <?php
        // 
       

        $sql = "SELECT * FROM products";

        $result = $conn->query($sql);

        $data = array();

        while($row = $result->fetch_assoc()):
        ?>
    <tr>
        <td>
            <img src="<?php echo $row["image"] ?>" alt="" style="width:50px;height:50px;"/>
            
        </td>
        <td>
            <?php echo $row["name"] ?>
        </td>
        <td>
            <?php echo $row["description"] ?>
        </td>
        <td>
            <?php echo $row["instock"] ?>
        </td>
        <td>
        <?php echo number_format($row["price"]) . " ₭" ?>
        </td>
        <td>
            <a href="products_edit.php?id=<?php echo $row["id"]?>">edit </a>
            <a href="products_delete.php?id=<?php echo $row["id"]?>">delete</a>
        </td>
    </tr>
        <!--  -->
        <?php
        endwhile;
        ?>
</table>
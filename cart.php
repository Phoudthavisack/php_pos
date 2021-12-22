<?php
include('session.php');
include('config.php');

?>

<style>
    table{
        border-collapse:collapse;
        border: 1px solid black;
    }
    tr td, tr th {
        border:1px solid black;
        padding:10px;
    }
</style>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>qty</th>
        <th>price</th>
        <th>total</th>
        <th>tool</th>
    </tr>
    <?php
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $cartLength = count($cart);
        $total = 0;
        for($i=0; $i< $cartLength;$i++):
            $total += $cart[$i]['price']*$cart[$i]['qty'];
    ?>
    <tr>
        <td><?php echo $cart[$i]['id']; ?></td>
        <td><?php echo $cart[$i]['name']; ?></td>
        <td><?php echo $cart[$i]['qty']; ?></td>
        <td><?php echo number_format($cart[$i]['price']) . " ₭"; ?></td>
        <td><?php echo number_format($cart[$i]['price']*$cart[$i]['qty']) . " ₭"; ?></td>
        <td><a href="cart_delete.php?id=<?php echo $cart[$i]['id'] ?>">delete</a></td>
    </tr>
    <?php
        endfor;
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="color:red;"><?php echo number_format($total) . " ₭";?></td>
        <td></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href='cart_confirm.php' style="padding:10;border:1px solid blue; display:block;width: 100px;margin:10px">confirm</a>

<br/>
<br/>

<table>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>name</th>
        <th>description</th>
        <th>price</th>
        <th>instock</th>
        <th>tool</th>
    </tr>
    <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        while($row=$result->fetch_assoc()):
    ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><img src="<?php echo $row['image'] ?>" alt="" style="height:50px;width:auto"></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['instock'] ?></td>
        <td><a href="cart_add.php?id=<?php echo $row['id'] ?>">add to cart</a></td>
    </tr>
    <?php
        endwhile;
    ?>
</table>
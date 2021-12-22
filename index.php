<?php
    include('session.php');
?>

<h1>welcome !! <?php echo $_SESSION['name'] ?> | <span style="color:red"><?php echo $_SESSION['level'] ?></span></h1>
<ul>
    <li><a href="cart.php">cart</a></li>
    <?php if($_SESSION['level'] == "admin"):?>
        <li><a href="sales.php">sales</a></li>
        <li><a href="products.php">products</a></li>
        <li><a href="member.php">member</a></li>
    <?php endif; ?>
    <li><a href="logout.php">logout</a></li>
</ul>
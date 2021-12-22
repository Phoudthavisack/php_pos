<?php
    include('session.php');
    include('config.php');

    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $cartLength = count($cart);
        $order_total = 0;
        for($i=0; $i< $cartLength;$i++){
            $order_total += $cart[$i]['price']*$cart[$i]['qty'];
        }
        $staff_id = $_SESSION['user_id'];
        $sql_orders = "INSERT INTO orders (staff_id,order_total) VALUES ('$staff_id','$order_total')";
        if ($conn->query($sql_orders) === TRUE) {
            $order_id = $conn->insert_id;
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_orders . "<br>" . $conn->error;
        }
        for($i=0; $i< $cartLength;$i++){
            $product_id = $cart[$i]['id'];
            $qty = $cart[$i]['qty'];
            $price_total = $qty * $cart[$i]['price'];
            $sql_order_detail = "INSERT INTO order_detail (order_id,product_id,qty,price_total) VALUES ('$order_id','$product_id','$qty','$price_total')";

            if ($conn->query($sql_order_detail) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql_order_detail . "<br>" . $conn->error;
            }
            $sql_product_instock = "UPDATE products SET instock= instock - $qty  WHERE id='$product_id'";
            if ($conn->query($sql_product_instock) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql_product_instock . "<br>" . $conn->error;
            }
        }
        unset($_SESSION['cart']);
        header('Location:cart.php');
    }else{
        header('Location:cart.php');
    }

?>
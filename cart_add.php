<?php
    include('session.php');
    include('config.php');
    

if(!isset($_SESSION['cart'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $cart = array();
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result = $conn->query($sql);
        while($row=$result->fetch_assoc()){
            $qty = 1;
            $row['index'] = array(
                'id'=>$row['id'],
                'name'=>$row['name'],
                'price'=>$row['price'],
                'qty'=>$qty,
            );
            array_push($cart,$row['index']);
        }
        $_SESSION['cart'] = $cart;
    }
    // $JSON = json_encode($_SESSION['cart']);
    // echo $JSON;
    header('Location:cart.php');

}else{
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $check = 1;
        function cube($e){
            if($e['id'] == $_GET['id']){
                global $check;
                $check = 0;
                $e['qty'] += 1;
                return $e;
            }else{
                return $e;
            }
        }
        $b = array_map('cube', $_SESSION['cart']);
        if($check == 0){
            $_SESSION['cart'] = $b;
        }else{
            $sql = "SELECT * FROM products WHERE id='$id'";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()){
                $qty = 1;
                $row['index'] = array(
                    'id'=>$row['id'],
                    'name'=>$row['name'],
                    'price'=>$row['price'],
                    'qty'=>$qty,
                );
                array_push($_SESSION['cart'],$row['index']);
            }
        }
    }
    header('Location:cart.php');
}
?>
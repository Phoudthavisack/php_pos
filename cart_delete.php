<?php
include('session.php');

if(isset($_GET['id'])){
    if(isset($_SESSION['cart'])){
        $id = $_GET['id'];
        $check = 0;
        $index = 0;
        function cube($e,$i){
            global $index,$check;
            if($e['id'] == $_GET['id']){
                $check = 1;
                $index = $i;
                return $e;
            }else{
                return $e;
            }
        }
        array_map('cube', $_SESSION['cart'],array_keys($_SESSION['cart']));

        if($check > 0 ){
            array_splice($_SESSION['cart'],$index,1);
        }
        // $json = json_encode($_SESSION['cart']);
        // echo $json;
        header('Location:cart.php');
    }
}

?>
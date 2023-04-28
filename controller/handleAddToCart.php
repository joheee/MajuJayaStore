<?php
    require_once '../../utils/db.php';

    function handleAddToCart($user_id, $product_id, $stock) {
        $findCartQuery = "select * from cart where user_id='$user_id' and product_id='$product_id'";
        $con = connectToDatabase();
        $findCart = $con->query($findCartQuery);
        if($findCart->num_rows == 0) {
            $insertCartQuery = "INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `ammount`) VALUES (NULL, '$user_id', '$product_id', '1');";
            $con->query($insertCartQuery);
        } else {
            $cartStock = intval($findCart->fetch_all()[0][3]);
            $productStock = intval($stock);
            if($cartStock < $productStock) {
                $updateCartQuery = "UPDATE `cart` SET `ammount` = `ammount` + 1 WHERE `cart`.`user_id` = $user_id and `cart`.`product_id` = $product_id;";
                $con->query($updateCartQuery);
            } 
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }
?>
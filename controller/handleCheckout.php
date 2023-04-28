<?php
    require_once '../../utils/db.php';
    require_once 'getUserByEmail.php';
    require_once '../../utils/setError.php';

    function handleCheckout($payment) {
        $user_id = getUserByEmail($_SESSION['logged_user']['email'])[0][0];
        $sql = "select * from cart c join user u on c.user_id = u.user_id join product p on c.product_id = p.product_id where c.user_id = $user_id";
        $con = connectToDatabase();
        
        $res = $con->query($sql);
        if($res->num_rows == 0) {
            setError('you need to fill your cart first!');            
            return;
        }
        while($cart = $res->fetch_assoc()) {
            $user_id = $cart['user_id'];
            $product_id = $cart['product_id'];
            $ammount = $cart['ammount'];

            $insertTransactionQuery = "INSERT INTO `transaction` (`transaction_id`, `user_id`, `product_id`, `ammount`, `transaction_date`, `payment_method`) VALUES (NULL, '$user_id', '$product_id', '$ammount', current_timestamp(), '$payment');";
            $con->query($insertTransactionQuery);
            
            $updateProductQuery = "UPDATE `product` SET `product_stock` = product_stock - $ammount WHERE `product`.`product_id` = $product_id;";
            $con->query($updateProductQuery);

            $cart_id = $cart['cart_id'];
            $removeCartQuery = "DELETE FROM cart WHERE cart_id='$cart_id'";
            $con->query($removeCartQuery);
        }
    }
?>
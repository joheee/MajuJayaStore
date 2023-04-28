<?php
    require_once '../../utils/db.php';
    require_once 'getUserByEmail.php';

    function getCartByUserId() {
        $user_id = getUserByEmail($_SESSION['logged_user']['email'])[0][0];
        $sql = "select p.product_name, p.product_price, c.ammount, p.product_price * c.ammount as `total_price` from cart c join user u on c.user_id = u.user_id join product p on c.product_id = p.product_id where c.user_id = $user_id";
        $con = connectToDatabase();
        return $con->query($sql);
    }

    function getTotalPrice() {
        $user_id = getUserByEmail($_SESSION['logged_user']['email'])[0][0];
        $sql = "select sum(c.ammount * p.product_price) from cart c join user u on c.user_id = u.user_id join product p on c.product_id = p.product_id where c.user_id = $user_id";
        $con = connectToDatabase();
        return $con->query($sql)->fetch_all();
    }
?>
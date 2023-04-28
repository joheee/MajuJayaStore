<?php
    require_once '../../utils/db.php';
    require_once 'getUserByEmail.php';

    function getTransactionByUserId() {
        $user_id = getUserByEmail($_SESSION['logged_user']['email'])[0][0];
        $sql = "select p.product_name, p.product_price, t.ammount, t.transaction_date, t.payment_method, t.ammount * p.product_price as `total_price` from transaction t join user u on t.user_id = u.user_id join product p on p.product_id = t.product_id where u.user_id = $user_id order by t.transaction_date desc";
        $con = connectToDatabase();
        return $con->query($sql);
    }

    function getTotalPrice() {
        $user_id = getUserByEmail($_SESSION['logged_user']['email'])[0][0];
        $sql = "select sum(c.ammount * p.product_price) from transaction c join user u on c.user_id = u.user_id join product p on c.product_id = p.product_id where c.user_id = $user_id";
        $con = connectToDatabase();
        return $con->query($sql)->fetch_all();
    }
?>
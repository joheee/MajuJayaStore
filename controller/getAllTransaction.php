<?php
    require_once '../../utils/db.php';

    function getAllTransaction(){
        $sql = "select u.user_id,u.user_email,p.product_name,t.ammount,p.product_price, p.product_price*ammount as `total_price`,t.transaction_date from user u join transaction t on u.user_id = t.user_id join product p on p.product_id = t.product_id where user_role='customer' order by t.transaction_date desc";
        $con = connectToDatabase();
        return $con->query($sql);
    }
?>
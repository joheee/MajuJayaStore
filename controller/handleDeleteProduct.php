<?php
    require_once '../../utils/db.php';

    function handleDeleteProduct($id) {
        $sql = "DELETE FROM `product` WHERE `product`.`product_id` = $id";
        $con = connectToDatabase();
        $con->query($sql);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
?>
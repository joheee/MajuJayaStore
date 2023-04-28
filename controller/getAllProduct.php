<?php
    require_once '../../utils/db.php';
    
    function getAllProduct(){
        $sql = 'select * from product';
        $con = connectToDatabase();
        return $con->query($sql);
    }

    function getAllProductForCustomer(){
        $sql = 'select * from product where product_stock > 0';
        $con = connectToDatabase();
        return $con->query($sql);
    }
?>
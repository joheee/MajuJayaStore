<?php
    require_once '../../utils/db.php';
    
    function getProductById($id){
        $sql = "select * from product where product_id='$id'";
        $con = connectToDatabase();
        return $con->query($sql);
    }
?>
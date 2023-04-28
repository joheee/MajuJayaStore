<?php
    require_once '../../utils/db.php';
    
    function getAllProduct(){
        $sql = 'select * from product';
        $con = connectToDatabase();
        return $con->query($sql);
    }
?>
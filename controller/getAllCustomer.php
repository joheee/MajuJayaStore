<?php
    require_once '../../utils/db.php';
    
    function getAllCustomer(){
        $sql = "select * from user where user_role='customer'";
        $con = connectToDatabase();
        return $con->query($sql);
    }
?>
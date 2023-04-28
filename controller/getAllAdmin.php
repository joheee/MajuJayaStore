<?php
    require_once '../../utils/db.php';
    
    function getAllAdmin(){
        $sql = "select * from user where user_role='admin'";
        $con = connectToDatabase();
        return $con->query($sql);
    }
?>
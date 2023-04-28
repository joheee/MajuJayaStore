<?php
    require_once '../../utils/db.php';
    
    function getUserByEmail($email){
        $sql = "select * from user where user_email='$email'";
        $con = connectToDatabase();
        return $con->query($sql)->fetch_all();
    }
?>
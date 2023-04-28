<?php
    require_once '../../utils/db.php';

    function adminMiddleware() {
        if(isset($_SESSION['logged_user'])){
            $user_email = $_SESSION['logged_user']['email'];
            $sql = "select * from user where user_email='$user_email'";            
            $con = connectToDatabase();
            $res = $con->query($sql);
            $row = $res->fetch_all();
            
            $role = $row[0][4];
            if($role == 'customer') {
                header("Location: ../customer/home.php");
                exit;
            } 
        }
    }
?>
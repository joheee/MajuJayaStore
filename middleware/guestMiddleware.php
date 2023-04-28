<?php
    require_once '../../utils/db.php';

    function guestMiddleware() {
        if(!isset($_SESSION['logged_user'])){
            header("Location: ../auth/login.php");
            exit;
        }
    }
?>
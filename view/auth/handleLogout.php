<?php
    require_once '../../middleware/guestMiddleware.php';

    session_start();

    if(isset($_SESSION['logged_user'])){
        unset($_SESSION['logged_user']);
    }

    guestMiddleware();
?>
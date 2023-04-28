<?php
    require_once '../../utils/db.php';
    require_once '../../middleware/authMiddleware.php';

    function handleChangePassword($email,$password) {
        $sql = "UPDATE `user` SET `user_password` = '$password' WHERE `user`.`user_email` = '$email';";
        $con = connectToDatabase();
        $con->query($sql);
        $_SESSION['logged_user']['password'] = $password;
        authMiddleware();
    }
?>
<?php
    require_once '../../utils/db.php';
    require_once '../../utils/setError.php';
    require_once '../../middleware/authMiddleware.php';

    function handleRegister($name, $address, $email, $password) {
        $con = connectToDatabase();
        
        $findSql = "select * from user where user_email='$email'";
        $res = $con->query($findSql);

        if($res->num_rows == 0) {
            $insertSql = "INSERT INTO `user` VALUES (NULL, '$name', '$email', '$password', 'customer', '$address');";
            $con->query($insertSql);

            $user = array(
                'email' => $email,
                'password' => $password
            );
            $_SESSION['logged_user'] = $user;
            authMiddleware();
        } else setError('email has been used!');
    }
?>
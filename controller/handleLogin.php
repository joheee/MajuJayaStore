<?php
    require_once '../../utils/db.php';
    require_once '../../utils/setError.php';
    
    function handleLogin($email, $password) {
        $sql = "select * from user where user_email='$email' and user_password='$password'";
        $con = connectToDatabase();
        $res = $con->query($sql);
        if($res->num_rows == 0) {
            setError("invalid credentials!");
        } else {
            $user = array(
                'email' => $email,
                'password' => $password
            );
            $_SESSION['logged_user'] = $user;
            header("Location: ../customer/home.php");
            exit;
        }
    }
?>
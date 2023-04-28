<?php 
    require_once '../../controller/getUserByEmail.php';
    require_once '../../controller/handleAddToCart.php';

    session_start();

    $product_id = $_GET['id'];
    $stock = $_GET['stock'];
    $user_id = getUserByEmail($_SESSION['logged_user']['email'])[0][0];
    handleAddToCart($user_id, $product_id, $stock);
?>
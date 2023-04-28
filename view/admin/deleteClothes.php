<?php
    require_once '../../controller/deleteProduct.php';
    $id = $_GET['id'];
    deleteProduct($id);
?>
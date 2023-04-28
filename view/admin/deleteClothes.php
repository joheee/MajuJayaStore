<?php
    require_once '../../controller/handleDeleteProduct.php';
    $id = $_GET['id'];
    handleDeleteProduct($id);
?>
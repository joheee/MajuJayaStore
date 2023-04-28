<?php 
    require_once '../../utils/db.php';
    require_once '../../utils/setError.php';

    function handleUpdateCloth($id,$name,$stock,$price) {
        if($stock == 0 || $price == 0) {
            setError('stock or price must be more than 0!');
            return;
        }
        $sql = "UPDATE `product` SET `product_name` = '$name', `product_stock` = '$stock', `product_price` = '$price' WHERE `product`.`product_id` = $id;";
        $con = connectToDatabase();
        $con->query($sql);

        header("Location: clothes.php");
        exit;
    }
?>
<?php 
    require_once '../../utils/db.php';
    require_once '../../utils/setError.php';

    function handleInsertCloth($name,$stock,$price) {
        if($stock == 0 || $price == 0) {
            setError('stock or price must be more than 0!');
            return;
        }
        $sql = "INSERT INTO `product` VALUES (NULL, '$name', '$stock', '$price');";
        $con = connectToDatabase();
        $con->query($sql);

        header("Location: clothes.php");
        exit;
    }
?>
<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Home | MajuJaya']) ?>

<?php 

    require_once '../../middleware/guestMiddleware.php';
    require_once '../../middleware/customerMiddleware.php';
    require_once '../../controller/getAllProduct.php';
    session_start();
    guestMiddleware();
    customerMiddleware();

?>

<div class="">
this is home php
</div>

<?= include_template('../../view/template/footer.php') ?>
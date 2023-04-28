<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Home | MajuJaya']) ?>


<?php 
    require_once '../../middleware/guestMiddleware.php';
    require_once '../../middleware/customerMiddleware.php';
    require_once '../../controller/getAllProduct.php';
    session_start();
    guestMiddleware();
    customerMiddleware();
    $clothes = getAllProductForCustomer();
?>

<div id="wrapper">
    <?= include_template('../../view/template/customerSidebar.php') ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">
    
            <?= include_template('../../view/template/customerNavigation.php', ['title' => 'Buy Clothes', 'email' => $_SESSION['logged_user']['email']]) ?>
    
            <div class="container-fluid">

                <div class="container card p-5">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Stock</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($clothe = $clothes->fetch_assoc()) { ?>
                                <tr>
                                <td><?php echo $clothe['product_name'] ?></td>
                                <td><?php echo $clothe['product_stock'] ?></td>
                                <td><?php echo $clothe['product_price'] ?></td>
                                <td class="row gap-2">
                                    <a class="col-auto btn btn-info" href="handleBuy.php?id=<?php echo $clothe['product_id'] ?>&stock=<?php echo $clothe['product_stock'] ?>">buy</a>
                                </td>
                                </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
    
        </div>
    
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright Maju Jaya &copy;</span>
                </div>
            </div>
        </footer>
    
    </div>
</div>

<?= include_template('../../view/template/footer.php') ?>
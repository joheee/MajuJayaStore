<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Your Cart | MajuJaya']) ?>


<?php 
    require_once '../../middleware/guestMiddleware.php';
    require_once '../../middleware/customerMiddleware.php';
    require_once '../../controller/getCartByUserId.php';
    session_start();
    guestMiddleware();
    customerMiddleware();
    $carts = getCartByUserId();
    $totalPrice = getTotalPrice()[0][0];
?>

<div id="wrapper">
    <?= include_template('../../view/template/customerSidebar.php') ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">
    
            <?= include_template('../../view/template/customerNavigation.php', ['title' => 'Your Cart', 'email' => $_SESSION['logged_user']['email']]) ?>
    
            <div class="container-fluid">

                <div class="container card p-5">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Ammount</th>
                            <th scope="col">Total Price per Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($cart = $carts->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $cart['product_name'] ?></td>
                                    <td><?php echo $cart['product_price'] ?></td>
                                    <td><?php echo $cart['ammount'] ?></td>
                                    <td><?php echo $cart['total_price'] ?></td>
                                </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                    <div class="">Total price : <?php echo $totalPrice ?></div>
                    
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
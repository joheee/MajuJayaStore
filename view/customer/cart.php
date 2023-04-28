<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Your Cart | MajuJaya']) ?>


<?php 
    require_once '../../middleware/guestMiddleware.php';
    require_once '../../middleware/customerMiddleware.php';
    require_once '../../controller/getCartByUserId.php';
    require_once '../../controller/handleCheckout.php';
    require_once '../../utils/setError.php';

    session_start();
    guestMiddleware();
    customerMiddleware();

    $carts = getCartByUserId();
    $totalPrice = getTotalPrice()[0][0];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!empty($_POST['payment'])) handleCheckout($_POST['payment']);
        else setError("input your payment method!");
        $carts = getCartByUserId();
        $totalPrice = getTotalPrice()[0][0];
    }
?>

<div id="wrapper">
    <?= include_template('../../view/template/customerSidebar.php') ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">
    
            <?= include_template('../../view/template/customerNavigation.php', ['title' => 'Your Cart', 'email' => $_SESSION['logged_user']['email']]) ?>
    
            <div class="container-fluid">

                <form action="" method="post" class="container card p-5">
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

                    <div class="mb-4">Total price : <?php echo $totalPrice ?></div>
                    
                    <?php if(isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger" role="alert" style="width: 20rem;">
                            <?php 
                                echo $_SESSION['error']; 
                                unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php } ?>

                    <div class="form-outline mb-3" style="width: 20rem;">
                        <input type="text" id="form2Example27" class="form-control form-control-lg" placeholder="input payment method" name="payment"/>
                    </div>

                    <button type="submit" style="width: 20rem;" class="btn btn-info btn-lg btn-block" type="submit">Checkout</button>

                </form>
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
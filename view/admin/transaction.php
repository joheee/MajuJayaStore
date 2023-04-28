<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Transaction | MajuJaya']) ?>


<?php 
    require_once '../../middleware/guestMiddleware.php';
    require_once '../../middleware/adminMiddleware.php';
    require_once '../../controller/getAllTransaction.php';
    session_start();
    guestMiddleware();
    adminMiddleware();
    $customers = getAllTransaction();
?>

<div id="wrapper">
    <?= include_template('../../view/template/adminSidebar.php') ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">
    
            <?= include_template('../../view/template/adminNavigation.php', ['title' => 'All Customer Transaction']) ?>
    
            <div class="container-fluid">
                <div class="container card p-5">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Customer Email</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Ammount</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($customer = $customers->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $customer['user_id'] ?></td>
                                    <td><?php echo $customer['user_email'] ?></td>
                                    <td><?php echo $customer['product_name'] ?></td>
                                    <td><?php echo $customer['ammount'] ?></td>
                                    <td><?php echo $customer['product_price'] ?></td>
                                    <td><?php echo $customer['total_price'] ?></td>
                                    <td><?php echo $customer['transaction_date'] ?></td>
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
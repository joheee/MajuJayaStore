<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Clothes | MajuJaya']) ?>


<?php 
    require_once '../../middleware/guestMiddleware.php';
    require_once '../../controller/getAllCustomer.php';
    session_start();
    guestMiddleware();
    $customers = getAllCustomer();
?>

<div id="wrapper">
    <?= include_template('../../view/template/adminSidebar.php') ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">
    
            <?= include_template('../../view/template/adminNavigation.php', ['title' => 'Customers']) ?>
    
            <div class="container-fluid">
                <div class="container card p-5">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Date Transaction</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($customer = $customers->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $customer['user_id'] ?></td>
                                    <td><?php echo $customer['user_name'] ?></td>
                                    <td><?php echo $customer['user_address'] ?></td>
                                    <td><?php echo 'kosong' ?></td>
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
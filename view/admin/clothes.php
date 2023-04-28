<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Product | MajuJaya']) ?>


<?php 
    require_once '../../middleware/guestMiddleware.php';
    require_once '../../controller/getAllProduct.php';
    session_start();
    guestMiddleware();
    $clothes = getAllProduct();
?>

<div id="wrapper">
    <?= include_template('../../view/template/adminSidebar.php') ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">
    
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                        </a>
                    </li>
                </ul>
            </nav>
    
            <div class="container-fluid">
    
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-shirt"></i> Insert New Clothes</a>
                </div>

                <div class="container card p-5">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Stock</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($clothe = $clothes->fetch_assoc()) { ?>
                                <tr>
                                <td><?php echo $clothe['product_id'] ?></td>
                                <td><?php echo $clothe['product_name'] ?></td>
                                <td><?php echo $clothe['product_stock'] ?></td>
                                <td><?php echo $clothe['product_price'] ?></td>
                                <td class="row gap-2">
                                    <a class="col-auto btn btn-primary" href="">update</a>
                                    <a class="col-auto btn btn-danger"  href="">delete</a>
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
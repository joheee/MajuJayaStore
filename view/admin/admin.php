<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Admin | MajuJaya']) ?>


<?php 
    require_once '../../middleware/guestMiddleware.php';
    require_once '../../controller/getAllAdmin.php';
    session_start();
    guestMiddleware();
    $admins = getAllAdmin();
?>

<div id="wrapper">
    <?= include_template('../../view/template/adminSidebar.php') ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">
    
            <?= include_template('../../view/template/adminNavigation.php', ['title' => 'Admin']) ?>
    
            <div class="container-fluid">
                <div class="container card p-5">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Admin ID</th>
                            <th scope="col">Admin Name</th>
                            <th scope="col">Admin Job</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($admin = $admins->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $admin['user_id'] ?></td>
                                    <td><?php echo $admin['user_name'] ?></td>
                                    <td>Manage Product</td>
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
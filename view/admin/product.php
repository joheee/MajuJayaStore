<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Product | MajuJaya']) ?>

<div id="wrapper">
    <?= include_template('../../view/template/adminSidebar.php') ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">
    
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
    
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                        </a>
                    </li>
    
                </ul>
    
            </nav>
            <!-- End of Topbar -->
    
            <!-- Begin Page Content -->
            <div class="container-fluid">
    
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
    
            </div>
            <!-- /.container-fluid -->
    
        </div>
        <!-- End of Main Content -->
    
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright Maju Jaya &copy;</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    
    </div>
    <!-- End of Content Wrapper -->
</div>

<?= include_template('../../view/template/footer.php') ?>
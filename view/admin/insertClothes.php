<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Insert New Shirt | MajuJaya']) ?>

<?php 
  require_once '../../controller/handleInsertCloth.php';
  require_once '../../utils/setError.php';
  require_once '../../middleware/guestMiddleware.php';
  require_once '../../middleware/adminMiddleware.php';
  
  session_start();
  guestMiddleware();
  adminMiddleware();
  
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['product_name']) && !empty($_POST['product_stock']) && !empty($_POST['product_price'])) handleInsertCloth($_POST['product_name'], $_POST['product_stock'], $_POST['product_price']);
    else setError("all field must be filled!");
  }
?>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <form method="post" action="" class="card-body p-5 text-center">

            <h3 class="mb-5">New Shirt</h3>

            <div class="form-outline mb-4">
              <input type="text" id="form2Example17" class="form-control form-control-lg" placeholder="product name" name="product_name">
            </div>

            <div class="form-outline mb-4">
              <input type="number" id="form2Example17" class="form-control form-control-lg" placeholder="product stock" name="product_stock">
            </div>

            <div class="form-outline mb-4">
              <input type="number" id="form2Example17" class="form-control form-control-lg" placeholder="product price" name="product_price">
            </div>


            <?php if(isset($_SESSION['error'])) { ?>
              <div class="alert alert-danger" role="alert" >
                  <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                  ?>
              </div>
            <?php } ?>
            
            <button class="mb-4 btn btn-primary btn-lg btn-block" type="submit">Insert shirt</button>

            <p class="" style="color: #393f81;">Back to admin page? <a href="clothes.php" style="color: #508bfc;">Click here</a></p>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= include_template('../../view/template/footer.php') ?>
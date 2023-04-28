<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Change Password | MajuJaya']) ?>

<?php 
  require_once '../../controller/handleChangePassword.php';
  require_once '../../utils/setError.php';
  require_once '../../middleware/guestMiddleware.php';
  
  session_start();
  guestMiddleware();

  $user = $_SESSION['logged_user'];

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['old-password']) && !empty($_POST['new-password']) && !empty($_POST['con-password'])) {
      if($_POST['old-password'] == $user['password']) {
        if($_POST['new-password'] == $_POST['con-password']) handleChangePassword($user['email'], $_POST['new-password']);
        else setError('new and confirm password must be the same!');
      } 
      else setError('old password invalid');
    }
    else setError("all field must be filled!");
  }
?>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <form method="post" action="" class="card-body p-5 text-center">

            <h3 class="mb-5">Change Password</h3>

            <div class="form-outline mb-4">
              <input type="email" id="form2Example17" disabled class="form-control form-control-lg" placeholder="email" value="<?php echo $user['email'] ?>" name="email">
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="old password" name="old-password"/>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="new password" name="new-password"/>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="confirm password" name="con-password"/>
            </div>

            <?php if(isset($_SESSION['error'])) { ?>
              <div class="alert alert-danger" role="alert" >
                  <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                  ?>
              </div>
            <?php } ?>

            <button class="mb-4 btn btn-primary btn-lg btn-block" type="submit">Change Password</button>

            <p class="" style="color: #393f81;">Abort change password? <a href="authByRole.php" style="color: #508bfc;">Back</a></p>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= include_template('../../view/template/footer.php') ?>
<?php require_once '../../utils/includeTemplate.php'; ?>
<?= include_template('../../view/template/header.php', ['title' => 'Sign In | MajuJaya']) ?>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign In</h3>

            <div class="form-outline mb-4">
              <input type="email" id="form2Example17" class="form-control form-control-lg" placeholder="email" name="email">
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="password" name="password"/>
            </div>

            <div class="alert alert-danger" role="alert" >
                error message
            </div>

            <button class="mb-4 btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <p class="" style="color: #393f81;">Don't have an account? <a href="/view/auth/register.php" style="color: #508bfc;">Sign up here</a></p>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= include_template('../../view/template/footer.php') ?>

<?= $this -> include('templates/header.php'); ?>
<?php $validation = \Config\Services::validation(); ?>



<div class="register-box">
	<div class="register-logo">
		<a href="./examples/register.html"><b>Admin</b>LTE</a>
	</div>

	<div class="card">
		<div class="card-body register-card-body">
			<p class="login-box-msg">Register a new membership</p>

            <?= view('templates/_message_block') ?> <!-- Message Box -->

			<form action="<?= base_url(route_to('register')) ?>" method="post">
                <?= csrf_field() ?>

				<!-- Full Name -->
				<div class="input-group-append">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
						<input type="text" class=" mx-2 form-control" placeholder="Username" id="name" name="username">
						<!-- Tooltip for Name -->
						<div class="input-group-append ms-1">
                            <i class="bi bi-question-circle" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" title="Name should contain a 
                            combination of <u>characters</u> and <u>spaces</u> only"></i>
						</div>
					</div>
				</div>
                <span class="text-danger"><?= session('errors.username') ?></span>

				<!-- Email -->
				<div class="input-group-append mt-3">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
						<input type="email" class="mx-2 form-control" placeholder="Email" id="email" name="email">
						<!-- Tooltip for Email -->
						<div class="input-group-append ms-1">
                            <i class="bi bi-question-circle" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" title="A valid email is one 
                            with proper <u>subdomain</u> and <u>domain</u> name after <em>@</em> and 
                            proper combination of <u>letters</u> and <u>numbers</u> before <em>@</em>"></i>
						</div>
					</div>
				</div>
                <span class="text-danger"><?= session('errors.email') ?></span>

				<!-- Password -->
				<div class="input-group-append mt-3">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
						<input type="password" class="mx-2 form-control" placeholder="Password" id="password" name="password" autocomplete="off">
						<!-- Tooltip for Password -->
						<div class="input-group-append ms-1">
							<span class="bi bi-question-circle" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="right" title="Password should be 
                            <u>atleast</u> <br> <em>6 characters long</em> and should contain a combination of <u>letters</u>, 
                            <u>numbers</u> and <u>symbols</u>[@, $, _]"></span>
						</div>
					</div>
				</div>
                <span class="text-danger"><?= session('errors.password') ?></span>

				<!-- Password Re-type -->
				<div class="input-group-append mt-3">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
						<input type="password" class="mx-2 form-control" placeholder="Retype password" id="re-password" name="pass_confirm" autocomplete="off">
						<!-- Tooltip for Password -->
						<div class="input-group-append ms-1">
							<i class="bi bi-question-circle" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="right" title="The password should 
                            match above"></i>
						</div>
					</div>
				</div>
                <span class="text-danger"><?= session('errors.pass_confirm') ?></span>
                
				<!-- Error Message -->
				<div class="row" id="ErrorMessage">
					<div class="alert alert-danger" style="width: 700px; display: none; background-color: #f8d7d1; border: 1px solid #f8d7d1;">
						<i class="text-danger"></i>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" id="agreeTerms" name="terms" value="agree">
							<label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block" id="register" name="submit">Register</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

<?php if(isset($loginButton) && $loginButton != '') : ?>
			<div class="social-auth-links text-center mb-3">
				<p>- OR -</p>
				<a href="<?= $loginButton ?>" class="btn btn-block btn-danger">
					<i class="fab fa-google mr-2"></i> Sign in using Google
				</a>
			</div>
			<!-- /.social-auth-links -->
<?php endif ?>

            <div class="row mt-5">
                <a href="<?= base_url(route_to('login')) ?>" class="m-1">I already have a membership</a>
            </div>
		</div>
		<!-- /.form-box -->
	</div><!-- /.card -->
</div>
<!-- /.register-box -->

<?= view('templates/footer.php'); ?>
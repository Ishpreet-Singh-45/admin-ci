

<?= view('templates/header.php') ?>

<?= session() -> set('redirect_url', '/dashboard'); ?>



<div class="login-box">
	<div class="login-logo">
		<a href=""><b>Admin</b>LTE</a>
	</div>

	<!-- Error Message -->
	<div class="container alert alert-danger" style="width: 350px; display: none;" id="errorBox">
		<div class="text-danger"></div>
	</div>

	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<?= view('templates\_message_block') ?>

			<form action="<?= base_url(route_to('login')) ?>" method="post">
				<?= csrf_field() ?>

				<!-- Username/Email Field 	-->
<?php if ($config -> validFields === ['email']) : ?>
				<div class="input-group">
				<input type="email" class="form-control" name="login" placeholder="Email" value="<?= old('username') ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<span class="text-danger"><?= session('errors.login') ?></span>
<?php else : ?>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Username/Email" id="email" name="login" value="<?= old('username') ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<span class="text-danger"><?= session('errors.login') ?></span>
<?php endif; ?>
				<!-- Password Field -->
				<div class="input-group mt-3">
					<input type="password" class="form-control" placeholder="Password" id="password" name="password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<span class="text-danger"><?= session('errors.password') ?></span>

<?php if($config -> allowRemembering) : ?>
				<!-- Rememeber Check -->
				<div class="row mt-3">
					<div class="col-8">
						<div class="icheck-primary">
						<input type="checkbox" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
							<label for="remember">Remember Me</label>
						</div>
						<span class="text-danger"></span>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
<?php endif; ?>
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

<?php if ($config->activeResetter): ?>
		<p>
			<a href="<?= base_url(route_to('forgot')) ?>">
				I forgot my password
			</a>
		</p>
<?php endif; ?>

<?php if ($config->allowRegistration) : ?>
		<p>
			<a href="<?= base_url(route_to('register')) ?>">
				Register a new membership
			</a>
		</p>
<?php endif; ?>
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->

<?= view('templates/footer.php') ?>
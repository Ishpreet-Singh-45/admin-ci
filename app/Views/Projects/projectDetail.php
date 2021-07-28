
<?= $this -> extend('layout/main') ?>

<?php
	if(!empty($formData['files']))
	{
		$files = count(explode(', ', $formData['files']));
		$totalFiles = 10;
		$percent = ($files/$totalFiles)*100;
	}else
	{
		$percent = 0;
	}
	
?>

<?= $this -> section('content') ?>




	<!-- Site wrapper -->
	<div class="wrapper">
		
		<!-- Nav Bar -->
		<?= $this -> include('components/navbar') ?>

		<!-- Side Bar -->
		<?= $this -> include('components/sidebar') ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1><?= isset($page_title) ? $page_title : 'page_title' ?></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= PROJECTS ?>">Home</a></li>
								<li class="breadcrumb-item active">Project Detail</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Projects Detail</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
								<i class="fas fa-times"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
								<div class="row">
									<div class="col-12 col-sm-4">
										<div class="info-box bg-light">
											<div class="info-box-content">
												<span class="info-box-text text-center text-muted">Estimated budget</span>
												<span class="info-box-number text-center text-muted mb-0">
													<?= $formData['budget'] ?>
												</span>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-4">
										<div class="info-box bg-light">
											<div class="info-box-content">
												<span class="info-box-text text-center text-muted">Total amount spent</span>
												<span class="info-box-number text-center text-muted mb-0">
													<?= $formData['spent'] ?>
												</span>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-4">
										<div class="info-box bg-light">
											<div class="info-box-content">
												<span class="info-box-text text-center text-muted">Estimated project duration</span>
												<span class="info-box-number text-center text-muted mb-0">
													<?php
														$year = 0;
														$duration = $formData['duration'];
														$years = (int)($duration / 12);
														$months = (int)($duration % 12);
														$format = ($years == 0 && $months <= 12) ? "{$months} months " : "{$years} years {$months} months ";
														echo $format;
													?>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<h4>Recent Activity</h4>
											<div class="post">
												<div class="user-block">
													<img class="img-circle img-bordered-sm" src="<?= base_url('assets/dist/img/user1-128x128.jpg') ?>" alt="user image">
													<span class="username">
														<a href="#">Jonathan Burke Jr.</a>
													</span>
													<span class="description">Shared publicly - 7:45 PM today</span>
												</div>
												<!-- /.user-block -->
												<p>
													Lorem ipsum represents a long-held tradition for designers,
													typographers and the like. Some people hate it and argue for
													its demise, but others ignore.
												</p>

												<p>
													<a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
												</p>
											</div>

											<div class="post clearfix">
												<div class="user-block">
													<img class="img-circle img-bordered-sm" src="<?= base_url('assets/dist/img/user7-128x128.jpg') ?>" alt="User Image">
													<span class="username">
														<a href="#">Sarah Ross</a>
													</span>
													<span class="description">Sent you a message - 3 days ago</span>
												</div>
												<!-- /.user-block -->
												<p>
													Lorem ipsum represents a long-held tradition for designers,
													typographers and the like. Some people hate it and argue for
													its demise, but others ignore.
												</p>
												<p>
													<a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
												</p>
											</div>

											<div class="post">
												<div class="user-block">
													<img class="img-circle img-bordered-sm" src="<?= base_url('assets/dist/img/user1-128x128.jpg') ?>" alt="user image">
													<span class="username">
														<a href="#">Jonathan Burke Jr.</a>
													</span>
													<span class="description">Shared publicly - 5 days ago</span>
												</div>
												<!-- /.user-block -->
												<p>
													Lorem ipsum represents a long-held tradition for designers,
													typographers and the like. Some people hate it and argue for
													its demise, but others ignore.
												</p>

												<p>
													<a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
												</p>
											</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
								<h3 class="text-primary"><i class="fas fa-paint-brush"></i>
								<?php
									echo $formData['name'];
								?>

							</h3>
								<p class="text-muted">
									<?php
										echo $formData['desc'];
									?>
								</p>
								<br>
								<div class="text-muted">
									<p class="text-sm">Client Company
										<b class="d-block"><?php echo $formData['client']; ?></b>
									</p>
									<p class="text-sm">Project Leader
										<b class="d-block"><?php echo $formData['leader']; ?></b>
									</p>

									<!-- Project Progress -->
									<p class="text-sm text">
										Project Progress
										<div class="progress">
											<div class="progress-bar" role="progressbar" style="width: <?= $percent ?>%;" aria-valuemin="0" aria-valuemax="100">
											<?= $percent ?>%
											</div>
										</div>
									</p>
								</div>

								<h5 class="mt-5 text-muted">Project files</h5>
								<ul class="list-unstyled">
									<!-- displaying Files -->
									<?php
										$files = explode(', ', $formData['files']);
										$size = explode(', ', $formData['fileSize']);
									?>
									<?php if(!empty($files) && !empty($size) && $files[0] != '') : ?>
										<?php for($i = 0; $i < count($files); $i++) : ?>
											<li>
												<a href="<?= base_url() . '/assets/uploads/' . $formData['id'] . '/' . $files[$i] ?>" target="_blank" class="btn-group btn-group-sm align-middle text-right text-decoration-none"><i class="bi bi-caret-right me-1"></i><?= $files[$i] ?></a>
											</li>
										<?php endfor ?>
									<?php else : ?>
										<li>
											<i class="text-danger">No files found!</i>
										</li>
									<?php endif ?>
								</ul>
								<div class="text-center mt-5 mb-3">
									<a href=<?= PROJECT_EDIT . $formData['id'] ?> class="btn btn-sm btn-info">Edit this Project</a>
									<a href="#" class="btn btn-sm btn-warning">Report contact</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.1.0
			</div>
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->



<?= $this -> endSection() ?>
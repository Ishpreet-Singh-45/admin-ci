
<?= $this -> extend('layout/main') ?>

<?php

helper('form');
$validation = \Config\Services::validation();
?>

<?= $this -> section('content') ?>
	
	<!-- Nav Bar -->
	<?= $this -> include('components/navbar'); ?>

	<!-- Side Bar -->
	<?= $this -> include('components/sidebar'); ?>

	<!-- 

	Inserting values according to the specified records based on id of the project 
	which is already extracted through the controller


	 -->

		<!-- Site wrapper -->
		<div class="wrapper">
		
		<!-- Error/Success Modal -->
		<div class="modal fade" tab-index="-1" id="Modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-success" id="header">
							<i class="bi bi-tick"></i>Success!
						</h5>
					</div>
					<div class="modal-body">
						<p class="text-success" id="body">
							Records Updated.
						</p>
					</div>
					<div class="modal-footer">
						<a href="<?= PROJECTS ?>" class="btn btn-secondary" id="footer" data-bs-dismiss='modal'>Okay</a>
					</div>
				</div>
			</div>
		</div>
		 <!-- End Modal -->
		<?php if(isset($success)) : ?>
			<!-- Javascript to show modal -->
		<?php endif ?>
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
								<li class="breadcrumb-item active">Project Edit</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			
			
			<!-- Main content -->
			<form method='post' action="">
				<div class="content">
					<div class="row">
						<div class="col-md-6">
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">General</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="inputName">Project Name</label>
										<input type="text" id="inputName" name="inputName" class="form-control" value="<?= $formData['name'] ?>">
										<i class="text-danger"><?= $validation -> getError('inputName') ?></i>
									</div>
									<div class="form-group">
										<label for="inputDescription">Project Description</label>
										<textarea id="inputDescription" name="inputDescription" class="form-control" rows="4"><?= trim($formData['desc']) ?></textarea>
										<i class="text-danger"><?= $validation -> getError('inputDescription') ?></i>
									</div>
									<div class="form-group">
										<label for="inputStatus">Status</label>
										<select id="inputStatus" class="form-control custom-select" name="inputStatus">
											<option disabled id="select">Select one</option>

											<?php switch($formData['status']) : 
												case "Success": ?>
													<option value="On Hold">On Hold</option>
													<option value="Cancelled">Cancelled</option>
													<option value="Success" selected >Success</option>
													<?php break; ?>
												<?php case "On Hold" : ?>
													<option value="On Hold" selected >On Hold</option>
													<option value="Cancelled">Cancelled</option>
													<option value="Success">Success</option>
													<?php break; ?>
												<?php case 'Cancelled' : ?>
													<option value="On Hold" >On Hold</option>
													<option value="Cancelled" selected >Cancelled</option>
													<option value="Success">Success</option>
													<?php break; ?>
											<?php endswitch ?>
											<i class="text-danger"><?= $validation -> getError('inputStatus') ?></i>
										</select>
									</div>
									<div class="form-group">
										<label for="inputClientCompany">Client Company</label>
										<input type="text" id="inputClientCompany" name="inputClientCompany" class="form-control" value="<?= $formData['client'] ?>">
										<i class="text-danger"><?= $validation -> getError('inputClientCompany') ?></i>
									</div>
									<div class="form-group">
										<label for="inputProjectLeader">Project Leader</label>
										<input type="text" id="inputProjectLeader" name="inputProjectLeader" class="form-control" value="<?= $formData['leader'] ?>">
										<i class="text-danger"><?= $validation -> getError('inputProjectLeader') ?></i>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<div class="col-md-6">
							<div class="card card-secondary">
								<div class="card-header">
									<h3 class="card-title">Budget</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="inputEstimatedBudget">Estimated budget</label>
										<input type="number" id="inputEstimatedBudget" name="inputEstimatedBudget" class="form-control" value="<?= $formData['budget'] ?>" step="1">
										<i class="text-danger"><?= $validation -> getError('inputEstimatedBudget') ?></i>
									</div>
									<div class="form-group">
										<label for="inputSpentBudget">Total amount spent</label>
										<input type="number" id="inputTotalSpent" name="inputTotalSpent" class="form-control" value="<?= $formData['spent'] ?>" step="1">
										<i class="text-danger"><?= $validation -> getError('inputTotalSpent') ?></i>
									</div>
									<div class="form-group">
										<label for="inputEstimatedDuration">Estimated project duration (in months)</label>
										<input type="number" id="inputEstimatedDuration" name="inputEstimatedDuration" class="form-control" value="<?= $formData['duration'] ?>" step="1">
										<i class="text-danger"><?= $validation -> getError('inputEstimatedDuration') ?></i>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<?php
							$uri = current_url(true);
							$count = $uri -> getTotalSegments();
							$id = $uri -> getSegment($count);
							?>
							<!-- /.card -->
							<div class="card card-info">
								<div class="card-header">
									<h3 class="card-title">Files</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="card-body p-0">
									<table class="table">
										<thead>
											<tr>
												<th style="width: 45%; overflow: hidden;">File Name</th>
												<th style="width: 20%;">File Size</th>
												<th>
													<?= anchor('/admin/project/fileupload/' . $id, "<i class='fas fa-folder-plus me-1'></i> Add File", array(
														'title' => "Sample", 
														'class' => "btn btn-primary px-1 py-0",
														'style' => "transform: translateX(15px);",
														'id' => "anchorAddFile"
														)) 
													?>
												</th>
											</tr>
										</thead>
										<tbody>
											<!-- displaying Files -->
											<?php
												// $fileClass = \Config\Services::
												$files = explode(', ', $formData['files']); // Files Array
												$size = explode(', ', $formData['fileSize']); // Files Sizes Array
											?>
											<?php if(!empty($files) && !empty($size) && $files[0] != "") : ?>
												<?php for($i = 0; $i < count($files); $i++) : ?>
													<tr>
														<td><?= $files[$i] ?></td>
														<td><?= $size[$i] ?></td>
														<td>
															<a href="<?= base_url() . '/assets/uploads/' . $formData['id'] . '/' . $files[$i] ?>" target="_blank" class="btn-group btn-group-sm align-middle text-right text-decoration-none ms-3"><i class="fas fa-eye"></i></a>
															<!-- <a href=" // base_url() . '/admin/delete/file/d=' . $formData['id']. '/n=' . $files[$i] " class="btn-group btn-group-sm text-center text-decoration-none ms-3"><i class="fas fa-trash"></i></a> -->
														</td>
													</tr>
												<?php endfor ?>
											<?php else : ?>
												<tr>
													<td>
														<i class="text-danger">No files found!</i>	
													</td>
												</tr>
											<?php endif ?>
										</tbody>
									</table>
								</div> 
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="<?= PROJECTS ?>" class="btn btn-secondary">Cancel</a>
							<input type="submit" value="Save Changes" class="btn btn-success float-right">
						</div>
					</div>
				</div>
				<!-- /.content -->
			</form>
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



<!-- This section is for displaying files in the table view of files card. After clicking on Add files 
Button the files added will be displayed there . Yet to be added. This is the code -->
<script type="text/javascript">
			$(function()
			{
				$('#inputFiles').submit((event) => 
				{
					event.preventDefault()

					// set files with their data
					for(const file of fileList)
					{
						const name = file.name ? file.name : "Not Supported"
						const size = file.size ? file.size : "Not Supported"
						let txt1 = `<tr>
						<td>${name}</td>
						<td>${size}</td>
						<td class="text-right py-0 align-middle">
							<div class="btn-group btn-group-sm">
								<a href="admin/project/file/uploads/${name}" target="_blank" class="btn btn-info"><i class="fas fa-eye"></i></a>
							</div>
						</td>
						</tr>`
						$('#row_list').append(txt1);
					}
				})
			})
		</script>
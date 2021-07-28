<?php

helper('form');
$validation = \Config\Services::validation();
?>

<?= $this -> extend('layout/main') ?>


<?= $this -> section('content') ?>

    <!-- Success/Error Modal -->
    <div class="modal fade" tab-index="-1" id="Modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="head"></h1>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <h4 id="details"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Okay</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Site wrapper -->
    <div class="wrapper">
        
        <!-- Adding Navbar to the site -->
        <?= $this -> include('components/navbar') ?>

        <!-- Adding Sidebar to the site -->
        <?= $this -> include('components/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">	
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                <?= (isset($page_title)) ? $page_title : '{page_title}' ?>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= PROJECTS ?>">Home</a></li>
                                <li class="breadcrumb-item active">Project Add</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <form method="post" action=''>
                <!-- Main content -->
                <div class="content">
                    <div class="row">
                        <!-- Project Card -->
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
                                <!-- Project Card Body -->
                                <div class="card-body">
                                    <div class="form-group">
                                            <label for="inputName">Project Name</label>
                                            <input type="text" id="inputName" name="inputName" class="form-control">
                                            <i class="text-danger"><?= $validation -> getError('inputName') ?></i>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputDescription">Project Description</label>
                                            <textarea id="inputDescription" name="inputDescription" class="form-control" rows="4"></textarea>
                                            <i class="text-danger"><?= $validation -> getError('inputDescription') ?></i>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select id="inputStatus" name="inputStatus" class="form-control custom-select">
                                                <option selected disabled>Select one</option>
                                                <option>On Hold</option>
                                                <option>Cancelled</option>
                                                <option>Success</option>
                                            </select>
                                            <i class="text-danger"><?= $validation -> getError('inputStatus') ?></i>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Client Company</label>
                                        <input type="text" id="inputClientCompany" name="inputClientCompany" class="form-control">
                                        <i class="text-danger"><?= $validation -> getError('inputClientCompany') ?></i>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputProjectLeader">Project Leader</label>
                                            <input type="text" id="inputProjectLeader" name="inputProjectLeader" class="form-control">
                                            <i class="text-danger"><?= $validation -> getError('inputProjectLeader') ?></i>
                                    </div>
                                </div>
                                <!-- End Project Card Body -->
                            </div>
                        </div>
                        <!-- End Project Card -->

                        <!-- Budget Card -->
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
                                <!-- Budget Card Body -->
                                <div class="card-body">
                                    <div class="form-group">
                                            <label for="inputEstimatedBudget">Estimated budget</label>
                                            <input type="number" id="inputEstimatedBudget" name="inputEstimatedBudget" class="form-control" step="1">
                                            <i class="text-danger"><?= $validation -> getError('inputEstimatedBudget') ?></i>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputSpentBudget">Total amount spent</label>
                                            <input type="number" id="inputSpentBudget" name="inputTotalSpent" class="form-control" step="1">
                                            <i class="text-danger"><?= $validation -> getError('inputTotalSpent') ?></i>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputEstimatedDuration">
                                                Estimated project duration (in months)
                                            </label>
                                            <input type="number" id="inputEstimatedDuration" name="inputEstimatedDuration" class="form-control" step="1">
                                            <i class="text-danger"><?= $validation -> getError('inputEstimatedDuration') ?></i>
                                    </div>
                                </div>
                                <!-- End Budget Card Body -->
                            </div>
                        </div>
                        <!-- End Budget Card -->


                        <div class="row">
                            <div class="col-12">
                                <a href="<?= PROJECTS ?>" class="btn btn-secondary px-4" style="margin-left: 7%;">Cancel</a>
                                <input type="submit" id="submit" value="Create New Project" class="btn btn-success float-right" style="margin-right: 7%;">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer mt-5">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- End site Wrapper -->

<?= $this -> endSection() ?>
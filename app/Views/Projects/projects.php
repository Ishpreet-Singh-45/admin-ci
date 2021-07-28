<!-- Extend the layout - means to show this dynamic content mentioned
inside this file with header and footer as its part -->

<?= $this -> extend('layout/main') ?>

<!-- mention the section to be rendered inside layout -->

<?= $this -> section('content') // remember to use the same name as mentioned in the layout file ?>

    <!-- Nav Bar -->
    <?= $this -> include('components/navbar') ?>

    <!-- Side Bar -->
    <?= $this -> include('components/sidebar', array('user' => $user)) ?>

   

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= (isset($page_title)) ? $page_title : 'page_title' ?></h1>
                        </div>
                        
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= PROJECTS ?>">Home</a></li>
                                <li class="breadcrumb-item active">Projects</li>
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
                        <h3 class="card-title">Projects</h3>
        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 18%">Project Name</th>
                                    <th style="width: 25%"> Team Members</th>
                                    <th>Project Progress</th>
                                    <th style="width: 10%" class="text-center">Status</th>
                                    <th style="width: 25%">
                                        <a href="<?= PROJECT_NEW ?>" class="text-light btn btn-danger ms-5" style="transform: translateX(15px);">Add New Project</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; if(isset($details)) : ?>
                                    <?php foreach($details as $project) : ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                    helper('form');
                                                    echo $i;
                                                    $i++;
                                                    form_hidden('id', $project['Id']);
                                                ?>
                                            </td>
                                            <td> 
                                                <?= $project['Name'] ?> 
                                            </td>
                                            <!-- Team Members -->
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="<?= base_url('assets/dist/img/avatar.png') ?>">	
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="<?= base_url('assets/dist/img/avatar2.png') ?>">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="<?= base_url('assets/dist/img/avatar3.png') ?>">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="<?= base_url('assets/dist/img/avatar4.png') ?>">
                                                    </li>
                                                </ul>
                                            </td>
                                            <!-- Team Members End -->
        
                                            <?php
                                                if(!empty($project['Files']))
                                                {
                                                    $files = count(explode(', ', $project['Files']));
                                                    $totalFiles = 10;
                                                    $percent = ($files/$totalFiles)*100;
                                                }else
                                                {
                                                    $percent = 0;
                                                }
                                                
                                            ?>
                                            <!-- Project Progress -->
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent ?>%;">
                                                    </div>
                                                </div>
                                                <small><?= $percent ?>% Complete</small>
                                            </td>
                                            
                                            <!-- Status -->
                                            <td class="project-state">
                                                <?php switch($project['Status']) :
                                                    case "Success" : ?>
                                                        <span class="badge badge-success px-2">Success</span>
                                                        <?php break; ?>
                                                    <?php case "On Hold" : ?>
                                                        <span class="badge badge-secondary px-2">On Hold </span>
                                                        <?php break; ?>
                                                    <?php case "Cancelled" : ?>
                                                        <span class="badge badge-danger">Cancelled </span>
                                                        <?php break; ?>
                                                <?php endswitch ?>
                                            </td>
                                            <!-- Project Options -->
                                            <td class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm me-1" href="<?= PROJECT_VIEW . $project['Id'] ?>">
                                                    <i class="fas fa-folder mx-1"></i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-sm m-1" href="<?= PROJECT_EDIT . $project['Id'] ?>">
                                                    <i class="fas fa-pencil-alt mx-1"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm ms-1" id="projectDelete" href="<?= PROJECT_DELETE . url_title($project['Name']) . '&' . $project['Id'] ?>">
                                                    <i class="fas fa-trash mx-1"></i>
                                                    Delete
                                                </a>
                                            <td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <div class="alert alert-danger"> No Records Found!</div>
                                <?php endif ?>
                            </tbody>
                        </table>
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
    </div>
    <!-- ./wrapper -->
    
    





<!-- and then end this section -->
<?= $this -> endSection() ?>
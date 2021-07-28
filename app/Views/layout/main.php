<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | <?= (isset($meta_title)) ? $meta_title : "{meta_title}" ?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href= "<?= base_url('/assets/fontawesome-free/css/all.min.css') ?>" >
	<!-- Theme style -->
	<link rel="stylesheet" href= "<?= base_url('/assets/dist/css/adminlte.min.css') ?>" >
    <!-- Bootstrap 5 Icons CSS -->
    <link rel="stylesheet" href= "<?= base_url('/assets/bootstrap5/icons/bootstrap-icons.css') ?>" >
	<!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href= "<?= base_url('/assets/bootstrap5/css/bootstrap.min.css') ?>" >
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('/assets/icheck-bootstrap/icheck-bootstrap.min.css') ?>" >
    <!-- jQuery -->
    <script type="text/javascript" src= "<?= base_url('/assets/jquery/jquery.min.js') ?>" ></script>
</head>

<style>
  .alert-danger
  {
    border: 1px solid #f8d7d1;
    background-color: #f8d7d1;
  }
</style>


<body class="hold-transition sidebar-mini">


    <!-- Our dynamic content -->
    <?= $this -> renderSection('content') ?>


</body>


<!-- Bootstrap 4 -->
<script type="text/javascript" src="<?= base_url('/assets/bootstrap/js/bootstrap.bundle.min.js') ?>" ></script>
<!-- Bootstrap 5 -->
<script type="text/javascript" src= "<?= base_url('/assets/bootstrap5/js/bootstrap.bundle.min.js') ?>" ></script>
<!-- AdminLTE App -->
<script type="text/javascript" src= "<?= base_url('/assets/dist/js/adminlte.min.js') ?>" ></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src= "<?= base_url('/assets/dist/js/demo.js') ?>" ></script>


<script type="text/javascript">
    $(function()
    {
        let name = (localStorage.getItem('username')) ? localStorage.getItem('username') : sessionStorage.getItem('username');
        $('.info .d-block').text(name);
    })
</script>

</body>
</html>
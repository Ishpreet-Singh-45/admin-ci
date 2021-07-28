<!-- jQuery -->
<script type="text/javascript" src= "<?= base_url('assets/jquery/jquery.min.js') ?>" ></script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>" ></script>
<!-- Bootstrap 5 -->
<script type="text/javascript" src= "<?= base_url('assets/bootstrap5/js/bootstrap.bundle.min.js') ?>" ></script>
<!-- AdminLTE App -->
<script type="text/javascript" src= "<?= base_url('assets/dist/js/adminlte.min.js') ?>" ></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src= "<?= base_url('assets/dist/js/demo.js') ?>" ></script>
<script>
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) 
	{
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})

	$(function()
	{
		$('div.hints').hover(function()
		{
			$('span#hint').attr('class', 'bi bi-question')
		}, function()
		{
			$('span#hint').attr('class', 'bi bi-question-circle')
		})
	})
</script>

</body>
</html>
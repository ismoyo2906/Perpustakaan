</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatable/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url(),'assets/datatable/datatables.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#table-datatables").dataTables();
		});
</script>

<script type="text/javascript">
	$('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<div class="footer">
<h5>Powered by <a href="<?php echo base_url().''?>">Kelompok 4</a>. All rights reserved</h5>
</div>
</body>
</html>
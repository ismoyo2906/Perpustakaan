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
<!-- include libries(jQuery, bootstrap) -->
<script type="text/javascript" src="<?php echo base_url().'assets/txt/css/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/bootstrap-3.2.0/dist/js/bootstrap.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/dist/summernote.min.js'?>"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote').summernote({
		height: "300px",
		styleWithSpan: false
	});
});
function postForm() {

	$('textarea[name="content"]').html($('#summernote').code());
}
</script>
<!-- Rich Text-->
<div class="footer">
  <h5>Powered by <a href="<?php echo base_url().''?>">Ismoyo Nugroho Djayusman</a>. All rights reserved</h5>
</div>
</body>
</html>
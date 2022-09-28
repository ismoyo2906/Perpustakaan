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
</body>
</html>
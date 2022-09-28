<div class="page-header">
<h3>New Post</h3>
</div>

<?php validation_errors('<p style="color:red;">','</p>');?>

<?php
	if($this->session->flashdata())
	{
		echo "<div class='alert alert-danger alert-massage'>";
		echo $this->session->flashdata('alert');
		echo "</div>";
	}
?>

<div class="summernote container">
		<form id="postForm" action="<?php echo base_url().'admin/tulis_informasi_act' ?>" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
			<div class="panel panel-default">
				<div class="panel-body">	
					<div class="form-group">
						<label>Title</label>
							<input type="text" class="form-control" name="title">
							<?php echo form_error('title'); ?>
							</div>
							
							<div class="form-group">
							<label>Tanggal Terbit</label>
							<input type="date" name="tgl_terbit" class="form-control">
							<?php echo form_error('tgl_terbit'); ?>
							</div>
							
							<textarea id="summernote" name="content" rows="10"></textarea>
							<?php echo form_error('content'); ?>
						<br/>
					</div>
				<div class="form_group">
					<input type="submit" value="Simpan" class="btn btn-primary btn-block">
				</div>
			</div>
	</form>
</div>
<br>
<br>
<br>
<br>
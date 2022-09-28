<div class="page-header">
<h3>Buku Baru</h3>
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

<form action="<?php echo base_url().'admin/tambah_kategori_act' ?>" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-body">	
	<div class="form-group">
		<div class="form-group">
			<label>Nama Kategori</label>
			<input type="text" name="nama_kategori" class="form-control">
			<?php echo form_error('nama_kategori'); ?>
		</div>

		<div class="form_group">
			<input type="submit" value="Simpan" class="btn btn-primary btn-block">
		</div>
	</div>
</div>
</form>
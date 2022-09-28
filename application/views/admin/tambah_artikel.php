<div class="page-header">
	<h3>Tambah Artikel</h3>
</div>
<form action="<?php echo base_url().'admin/tambah_anggota_act' ?>" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-body">
	
<div class="form-group">
	<label>Judul*</label>
	<input type="text" name="judul_artikel" class="form-control">
	<?php echo form_error('judul_artikel'); ?>
</div>

<form method="post">
	<textarea class="textarea" name="isi_artikel"></textarea>
</form>

<div class="form-group">
	<label>Gambar</label>
	<input type="file" name="gambar" class="form-control">
	<?php echo form_error('gambar'); ?>
</div>

<div class="form_group">
	<input type="submit" value="Simpan" class="btn btn-primary btn-block">
</div>
</div>
</div>
</form>
<br>
<br>
<br>
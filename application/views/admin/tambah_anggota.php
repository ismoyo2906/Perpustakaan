<div class="page-header">
<h3>Tambah Anggota Baru</h3>
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

<form action="<?php echo base_url().'admin/tambah_anggota_act' ?>" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-body">	
<div class="form-group">
	<label>Nama*</label>
	<input type="text" name="nama_anggota" class="form-control">
	<?php echo form_error('nama_anggota'); ?>
</div>

<div class="form-group">
	<label>Jenis Kelamin</label>
	<select name="gender" class="form-control">
		<option value=""></option>
		<option value="Laki-Laki">Laki-Laki</option>
		<option value="Perempuan">Perempuan</option>
	</select>
	<?php echo form_error('gender'); ?>
</div>
	
<div class="form-group">
	<label>Nomor Telepon*</label>
	<input type="text" name="no_tlpn" class="form-control">
	<?php echo form_error('no_tlpn'); ?>
</div>
	
<div class="form-group">
	<label>Alamat*</label>
	<textarea name="alamat" class="form-control"></textarea>
	<?php echo form_error('alamat'); ?>
</div>
	
<div class="form-group">
	<label>Email*</label>
	<input type="text" name="email" class="form-control">
	<?php echo form_error('email'); ?>
</div>
	
<div class="form-group">
	<label>Username*</label>
	<input type="text" name="username" class="form-control">
	<?php echo form_error('username'); ?>
</div>
	
<div class="form-group">
	<label>Password*</label>
	<input type="password" name="pass" class="form-control">
	<?php echo form_error('pass'); ?>
</div>
	
<div class="form-group">
	<label>Konfirmasi Password*</label>
	<input type="password" name="pass_konfirm" class="form-control">
	<?php echo form_error('pass_konfirm'); ?>
</div>

<div class="form_group">
	<input type="submit" value="Simpan" class="btn btn-primary btn-block">
</div>
</div>
</div>
</form>
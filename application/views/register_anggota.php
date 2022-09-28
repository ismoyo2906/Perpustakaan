<html>
<head>
<meta charset="utf-8">
<title>Register - Aplikasi Perpustakaan Berbasis Web</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css.map')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/js/bootstrap.js')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatables.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/footer-ind2906.css'?>">

	
</head>
<body>
	<div class="container clearfix">
	<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 col-md-offset-4" style="margin-top:0px">
		<div class="page-header">
		<center>
			<h2>Register</h2>
		</center>
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

<form action="<?php echo base_url().'welcome/register_anggota_act' ?>" method="post" enctype="multipart/form-data">
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
	<?php echo form_error('email'); ?>
</div>
	
<div class="form-group">
	<label>Email*</label>
	<input type="text" name="email" class="form-control">
	<?php echo form_error('email'); ?>
</div>
	
<div class="form-group">
	<label>Username*</label>
	<input type="text" name="username" class="form-control">
	<?php echo form_error('email'); ?>
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
</form>
	<br>
<form action="<?php echo base_url().'welcome/login' ?>" method="post" enctype="multipart/form-data">
<input type="submit" value="Batal" class="btn btn-primary btn-block">
</div>
</div>
</form>
</div>
</div>

<div class="footer">
  <h5>Powered by Ismoyo</h5>
</div>

</body>
</html>
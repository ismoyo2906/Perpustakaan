<html>
<head>
<meta charset="utf-8">
<title>Login - Aplikasi Perpustakaan Berbasis Web</title>
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
			<h2>APLIKASI PERPUSTAKAAN</h2>
		</center>
		</div>
		<?php
	
	//peringatan untuk username atau password salah//
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "gagal"){
					if($this->session->flashdata());
					echo $this->session->flashdata('alert');
					echo "<div class='alert alert-danger fade in'>Login gagal! Username atau Password salah.";
					echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>X</a>";
					echo "</div>";
			}
	//peringatan untuk menginput usernama dan password//
			else if($_GET['pesan'] == "belumlogin"){
				if($this->session->flashdata());
					echo $this->session->flashdata('alert');
					echo "<div class='alert alert-success fade in'>Silakan Login Dulu";
					echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>";
					echo "X";
					echo "</a>";
					echo "</div>";
			}
	//pemberitahuan telah log out//
			else if($_GET['pesan'] == "logout"){
				if($this->session->flashdata())
					echo $this->session->flashdata('Anda Telah Log Out');
					echo "<div class='alert alert-info fade in'>Anda Telah Log Out";
					echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>";
					echo "X";
					echo "</a>";
					echo "</div>";
			}
			else{
				if($this->session->flashdata());
					echo "<div class='alert alert-danger alert-massage'>";
					echo $this->session->flashdata('alert');
					echo "</div>";
				}
	  		}
	 	?>
		<br>
			<div class="panel panel-primary">
				<div class="panel-heading">Login</div>
				<div class="panel-body"
						<br>
				<form method="post" action="<?php echo base_url().'welcome/login_act'?>">
					<!--kolom input username-->
					
					<div class="form-group">
						<label  for="text">Username : </label>
							<input type="text" name="username" placeholder="username" class="form-control">
						<?php echo form_error('username');?>
					</div>
					
					<!--kolom input password-->		
					<div class="form-group">
						<label  for="password">Password : </label>
						<input type="password" name="password" placeholder="password" class="form-control">
						<?php echo form_error('password');?>
					</div>
					
					<div class="checkbox">
						<label><input type="checkbox"> Remember me</label>
					</div>
					
					<!--tombol login-->
					<div class="form-group">
						<button type="submit" value="Login" class="btn btn-success btn-block"> Login</button> 
					</div>
				</form>
				<form method="post" action="<?php echo base_url().'welcome/register'?>">
					<div class="form-group">
						<button type="submit" value="register" class="btn btn-warning btn-block" > Register</button></a>
					</div>
				</form>
				<form method="post" action="<?php echo base_url().''?>">
					<div class="form-group">
						<button type="submit" value="close" class="btn btn-danger btn-block"> Close</button>
					</div>
				</form>
			</div>				
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
	$('.alert-message').alert().delay(3000).slideUp('slow');
		</script>

<div class="footer">
  <h5>Powered by Ismoyo</h5>
</div>

	</body>
</html>
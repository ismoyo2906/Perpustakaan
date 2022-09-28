<div class="page-header">
<h3>Ganti Password</h3>
</div>
	<div class="container clearfix">
	<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 col-md-offset-4" style="margin-top:20px">
	<?php
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div class='alert alert-success'>Password Berhasil diganti.";
					echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>";
					echo "X";
					echo "</a>";
				echo "</div>";
			}
		}
	?>
	<div class="panel panel-default">
	<div class="panel-body">
	<form action="<?php echo base_url().'admin/ganti_password_act' ?>" method="post">
		
		<!--kolom password baru-->
		<div class="form-group">
			<label>Password Baru</label>
			<input class="form-control" type="password" name="pass_baru">
			<?php echo form_error('pass_baru'); ?>
		</div>
		
		<!--kolom ulangi password baru-->
		<div class="form-group">
			<label>Ulangi Password*</label>
			<input class="form-control" type="password" name="ulang_pass">
			<?php echo form_error('ulang_pass'); ?>
		</div>
		
		<div class="form_group">
		<input class="btn btn-primary btn-block btn-sm" type="submit" value="Simpan">
		</div>
	</form>
</div>
</div>
</div>
</div>
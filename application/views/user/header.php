<!doctype html>
<html>
<head>
<title>Dasboard - Aplikasi Perpustakaan</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css.map')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/footer-ind2906.css'?>">

</head>
<body>
<div class="x_panel">
<div class="x_title">

	<nav class="navbar navbar-default">
		<div class="container">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
				<a class="navbar-brand" href="<?php echo base_url().'user'; ?>">Perpustakaan</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-examplenavbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url().'user'; ?>"><span class="glyphicon glyphicon-home"></span> Home <span class="sronly"></span></a></li>
					<li><a href="<?php echo base_url().'user/buku'; ?>"><span class="glyphicon glyphicon-book"></span> Buku </a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="glyphicon glyphicon-user"> Tentang</b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'user/visi_misi'; ?>"> Visi & Misi</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li>
			<?php
				$text_cart_url  = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
				$text_cart_url .= ' Booking Cart: '. $this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'transaksi')->num_rows() .' Buku';
			?>
			<?=anchor('user/lihat_keranjang', $text_cart_url)?>
				</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"><?php echo " Hallo, <b>".$this->session->userdata('nama');?></b><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'user/ganti_password'; ?>"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a></li>
							<li><a href="<?php echo base_url().'user/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<div class="container">
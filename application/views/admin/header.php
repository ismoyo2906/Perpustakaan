<!doctype html>
<html>
<head>
<title>Dasboard - Aplikasi Perpustakaan</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css.map')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/footer-ind2906.css'?>">
<!---
Rich Text
-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-3.2.0/dist/css/bootstrap.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css')?>">
<!-- include summernote css/js-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/dist/summernote.css'?>">

<!---
    Summernote Rich Text Editor Example with PHP & Mysql
    http://hackerwins.github.io/summernote/
-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
				<a class="navbar-brand" href="<?php echo base_url().'admin'; ?>">Perpustakaan</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-examplenavbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url().'admin/tulis_informasi'; ?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Post</a></li>
					<li><a href="<?php echo base_url().'admin/informasi'; ?>"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;Informasi</a></li>
					<li><a href="<?php echo base_url().'admin/kategori'; ?>"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Kategori</a></li>
					<li><a href="<?php echo base_url().'admin/buku'; ?>"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Data Buku</a></li>
					<li><a href="<?php echo base_url().'admin/anggota'; ?>"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Data Anggota</a></li>
					<li><a href="<?php echo base_url().'admin/peminjaman'; ?>"><span class="glyphicon glyphicon-sort"></span>&nbsp;&nbsp;Transaksi Peminjaman</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"> Laporan</b><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'admin/cetak_laporan_buku'; ?>"><i class="glyphicon glyphicon-lock"></i> Lapora Data Buku </a></li>
							<li><a href="<?php echo base_url().'admin/cetak_laporan_anggota'; ?>"><span class="glyphicon glyphicon-lock"></span> Lapora Data Anggota </a></li>
							<li><a href="<?php echo base_url().'admin/cetak_laporan_transaksi'; ?>"><span class="glyphicon glyphicon-lock"></span> Lapora Data Transaksi </a></li>
						</ul>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"><?php echo " Hallo, <b>".$this->session->userdata('name');?></b><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'admin/ganti_password'; ?>"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a></li>
							<li><a href="<?php echo base_url().'admin/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<div class="container">
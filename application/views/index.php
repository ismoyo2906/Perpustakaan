<div class="page-header">
	<h2 class="text">~Selamat Datang</h2>
	<div class="clearfix"></div>
</div>
<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-tittle" style="font-size: 18px; font-weight: bold"<b><i class="glyphicon glyphicon-book"></i> Buku </h3>
			</div>
<div class="x_content">
<div class="clearfix"></div>
<div class="row">
	<?php foreach($buku as $b) { ?>
		<div class="col-sm-3 col-md-3">
		<div class="thumbnail" style="height: 370px;">
		<img src="<?php echo base_url().'assets/upload/'.$b->gambar; ?>" style="max-width:100%; max-height: 100%; height: 150px; width:120px">
	<div class="caption">
	<h4 style="min-height:40px;"><?php echo $b->pengarang?></h4>
	<p><?php echo substr($b->judul_buku,0,30).'..'?></p>
	<p><?php echo $b->penerbit?></p>
	<p><?php echo substr($b->thn_terbit,0,4)?></p>
	<p>
	<?php echo anchor('peminjaman/tambah_pinjam/' . $b->id_buku, 'Booking' , ['class' => 'btn btn-primary','role' => 'button'])?>
	<?php echo anchor('buku/katalog_detail/' . $b->id_buku, ' Detail' , ['class' => 'btn btn-warning glyphicon glyphicon-zoom-in','role' => 'button'])?>
	</p>
			</div>
		</div>
	</div>
<?php } ?>
</div>
</div>
	<div class="text-right">
		<a href="<?php echo base_url().'user/buku'?>">Lihat Semua Buku<i class="glyphicon glyphicon-arrow-right"></i></a>
	</div>
</div>
<hr>

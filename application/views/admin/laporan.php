<div class="page-header">
	<h3>Laporan</h3>
</div>

<br>
<br>

<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable" style="background-color:white">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th>Total Denda</th>
				<th>Status Buku</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($peminjaman as $p){
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $p->nama_anggota ?></td>
				<td><?php echo $p->tgl_pinjam ?></td>
				<td><?php echo $p->tgl_kembali ?></td>
				<td><?php echo 'Rp. '.number_format($p->total_denda)." ,-";?></td>
				<td><?php if($p->status_peminjaman == "1"){
								echo "Sudah Kembalikan";
					}else{
								echo "-";
					}
					?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
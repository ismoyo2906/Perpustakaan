<html>
	<head>
	<title></title>
	<style type="text/css">
	.table-data{
		width: 100%;
		border-collapse: collapse;
	}
	.table-data tr th,
	.table-data tr td{
		border:1px solid black;
		font-size: 10pt;
	}
	</style>
	
	</head>
	
		<table class="table table-bordered table-striped table-hover" id="table-datatable" style="background-color:white">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Buku</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun</th>
					<th>ISBN</th>
					<th>Lokasi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($buku as $b){
				?>
				<tr>
					<td><?php echo $no++;?></td>
					<td><?php echo $b->judul_buku ?></td>
					<td><?php echo $b->pengarang ?></td>
					<td><?php echo $b->penerbit ?></td>
					<td><?php echo $b->thn_terbit ?></td>
					<td><?php echo $b->isbn ?></td>
					<td><?php echo $b->lokasi ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
	<script type="text/javascript">
	window.print();
	</script>
</body>
</html>
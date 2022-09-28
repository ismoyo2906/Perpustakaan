<div class="page-header">
	<h3 class="text">Kategori</h3>
</div>

<a href="<?php echo base_url().'admin/tambah_kategori';?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Tambah Kategori</a>
<br>
<br>

<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable" style="background-color:white">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Kategori</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($kategori as $k){
			?>
			<tr>
				<td align="center"><?php echo $no++;?></td>
				<td align="center"><?php echo $k->nama_kategori ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
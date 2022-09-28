<div class="page-header">
	<h3>Edit Buku</h3>
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


<?php foreach($buku as $b){ ?>
<form action="<?php echo base_url().'admin/update_buku' ?>" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-body">
<div class="form-group">
<label>Kategori</label>
	<select name="id_kategori" class="form-control">
		<?php foreach($kategori as $k){ ?>
		<option value="<?php echo $k->id_kategori;?>"><?php echo $k->nama_kategori;?></option>
		<?php } ?>
	</select>
	<?php echo form_error('id_kategori'); ?>
	</div>
	
<div class="form-group">
	<label>Judul Buku</label>
	<input type="hidden" name="id" value="<?php echo $b->id_buku; ?>">
	<input type="text" name="judul_buku" class="form-control" value="<?php echo $b->judul_buku;?>">
	<?php echo form_error('judul_buku'); ?>
</div>
	
<div class="form-group">
	<label>Pengarang</label>
	<input type="text" name="pengarang" class="form-control" value="<?php echo $b->pengarang;?>">
	<?php echo form_error('pengarang'); ?>
</div>
	
<div class="form-group">
	<label>Penerbit</label>
	<input type="text" name="penerbit" class="form-control" value="<?php echo $b->penerbit;?>">
	<?php echo form_error('penerbit'); ?>
</div>
	
<div class="form-group">
	<label>Tahun Terbit</label>
	<input type="date" name="thn_terbit" class="form-control" value="<?php echo $b->thn_terbit;?>">
	<?php echo form_error('thn_terbit'); ?>
</div>
	
<div class="form-group">
	<label>ISBN</label>
	<input type="text" name="isbn" class="form-control" value="<?php echo $b->isbn;?>">
	<?php echo form_error('isbn'); ?>
</div>

<div class="form-group">
	<label>Jumlah Buku</label>
	<input type="text" name="jumlah_buku" class="form-control" value="<?php echo $b->jumlah_buku;?>">
	<?php echo form_error('jumlah_buku'); ?>
</div>
	
<div class="form-group">
	<label>Lokasi Buku</label>
	<select name="lokasi" class="form-control" value="<?php echo $b->lokasi;?>">
		<option <?php if($b->lokasi == "Rak 1"){echo "selected='selected'";} echo $b->lokasi; ?> value="Rak 1">Rak 1</option>
		<option <?php if($b->lokasi == "Rak 2"){echo "selected='selected'";} echo $b->lokasi; ?> value="Rak 2">Rak 2</option>
		<option <?php if($b->lokasi == "Rak 3"){echo "selected='selected'";} echo $b->lokasi; ?> value="Rak 3">Rak 3</option>
	</select>
	<?php echo form_error('lokasi'); ?>
</div>
	
<div class="form-group">
	<label>Status Buku</label>
	<select name="status_buku" class="form-control">
		<option <?php if($b->status_buku == "1"){echo "selected='selected'";} echo $b->status_buku; ?> value="1">Tersedia</option>
		<option <?php if($b->status_buku == "0"){echo "selected='selected'";} echo $b->status_buku; ?> value="0">Sedang Di Pinjam</option>
	</select>
	<?php echo form_error('status_buku'); ?>
</div>
	
<div class="form-group">
	<label>Gambar</label>
	<?php
		if(isset($b->gambar)){
		echo '<input type="hidden" name="old_pict" value="'.$b->gambar.'">';
			echo '<img src="'.base_url().'assets/upload/'.$b->gambar.'" width="30%">';
			}
			?>
	<input type="file" name="gambar" class="form-control">
	<?php echo form_error('gambar'); ?>
</div>

<div class="form_group">
	<input type="submit" value="Update" class="btn btn-primary btn-block">
</div>
</div>
</div>
</form>
<?php } ?>
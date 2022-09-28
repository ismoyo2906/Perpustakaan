<div class="page-header">
	<h3>Meminjam</h3>
</div>
<form action="<?php echo base_url().'admin/tambah_peminjaman_act' ?>" method="post">
	
	<div class="form-group">
		<label>Anggota</label>
		<select name="id_anggota" class="form-control">
			<option value="">-Pilih Anggota-</option>
			<?php foreach ($anggota as $a) {?>
				<option value="<?php echo $a->id_anggota; ?>"><?php echo $a->nama_anggota; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('id_anggota'); ?>
	</div>

	<div class="form-group">
		<label>Buku</label>
		<select name="id_buku" class="form-control">
			<option value="">-Pilih Buku-</option>
			<?php foreach ($buku as $b) {?>
				<option value="<?php echo $b->id_buku; ?>"><?php echo $b->judul_buku; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('id_buku'); ?>
	</div>
		
	<div class="form-group">
		<label>Tanggal Pinjam</label>
		<input type="date" name="tgl_pinjam" class="form-control">
		<?php echo form_error('tgl_pinjam'); ?>
	</div>

	<div class="form-group">
		<label>Tanggal Kembali</label>
		<input type="date" name="tgl_kembali" class="form-control">
		<?php echo form_error('tgl_kembali'); ?>
	</div>

	<div class="form-group">
		<label>Harga Denda</label>
		<input type="text" name="denda" class="form-control">
		<?php echo form_error('denda'); ?>
	</div>

	<div class="form-group">
		<input type="submit" value="simpan" class="btn btnprimary btn-sm">
	</div>
</form>
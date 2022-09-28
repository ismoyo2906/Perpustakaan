<div style="padding: 25px;">
<div class="page-header">
 <h3 style="position: relative; left: 20%">Data Peminjam</h3>
</div>

<div style="position: relative; left: 20%">
<table>
 <?php
 foreach ($anggota as $a) {
 ?>
 <tr>
 <th>Nama Peminjam</th><th>:</th><th><?php echo $a->nama_anggota;?></th></tr>
 <tr><th>Alamat</th><th>:</th><th><?php echo $a->alamat; ?></th>
 <?php } ?>
 </tr>
 <tr>
 <td colspan="3">

 <div class="page-header">
 <h3>Data Buku</h3>
 </div>
 <div class="table-responsive">
 <table class="table table-bordered table-striped table-hover"
id="table-datatable" >
 <thead>
 <tr>
 <th>No</th>
 <th>Gambar</th>
 <th>Judul Buku</th>
 <th>Pengarang</th>
 <th>Penerbit</th>
 <th>Tahun</th>
 <th>Pilihan</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $no = 1;
 foreach($peminjaman as $p){
 ?>
<tr>
 <td><?php echo $no++; ?></td>
 <td><img src="<?php echo
base_url();?>assets/upload/<?php echo $p->gambar; ?>" width="70"></td>
 <td style="max-width: 200px"><?php echo $p->judul_buku; ?></td>
 <td><?php echo $p->pengarang; ?></td>
 <td><?php echo $p->penerbit; ?></td>
 <td><?php echo $p->thn_terbit; ?></td>
 </form>
<td>
 <a class="btn btn-sm btn-danger" href="<?php echo
base_url().'user/hapus_keranjang/'.$p->id_pinjam ?>"><span class="glyphicon
glyphicon-trash"></span> </a>
 <br/>
 </td>
 </tr>
 <?php } ?>
 </tbody>
 </table>
 </div>
 </td>
 </tr>
 <tr><td colspan="3"><hr></td></tr>
 <tr>
 <td align="left">
 <a class="btn btn-sm btn-primary" href="<?php echo
base_url().'user'; ?>"><span class="glyphicon glyphicon-arrow-right"></span>
Lanjutkan Booking Buku</a>
 </td>
 <td>
 &nbsp;
 </td>
 <td align="right">
 <a class="btn btn-sm btn-success" href="<?php echo
base_url().'user/selesai_booking/'.$this->session->userdata('id_agt');
?>"><span class="glyphicon glyphicon-ok"></span> Selesaikan Booking</a>
 </td>
 </tr>
</table>
</div>
</div>

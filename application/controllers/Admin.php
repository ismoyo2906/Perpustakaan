<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
//Cek Login
		if($this->session->userdata('sts') != "login"){
			redirect(base_url().'welcome?pesan=belumlogin');
		}
	}
	
function index(){

	$data['peminjaman'] = $this->db->query("select * from peminjaman order by id_pinjam desc limit 10")->result();
	$data['transaksi'] = $this->db->query("select * from transaksi order by id_pinjam desc limit 10")->result();
	$data['anggota'] = $this->db->query("select * from anggota order by id_anggota desc limit 10")->result();
	$data['buku'] = $this->db->query("select * from buku order by id_buku desc limit 10")->result();
	
$this->load->view("admin/header");
$this->load->view("admin/index",$data);
$this->load->view("admin/footer");
}

function kategori(){
	$data['kategori'] = $this->m_perpus->get_data('kategori')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/kategori",$data);
	$this->load->view("admin/footer");
}

function tambah_kategori(){
	$this->load->view("admin/header");
	$this->load->view("admin/tambah_kategori");
	$this->load->view("admin/footer");
}

function tambah_kategori_act(){
	$nama_kategori = $this->input->post('nama_kategori');
	$this->form_validation->set_rules('nama_kategori','Nama Kategori','required');
	if($this->form_validation->run() !=FALSE){
		
		$data = array(
		'nama_kategori' => $nama_kategori);
		
		$this->m_perpus->insert_data($data,'kategori');
		redirect(base_url().'admin/kategori');
}else{
	$this->load->view("admin/header");
	$this->load->view("admin/tambah_kategori");
	$this->load->view("admin/footer");
	}
}

	

function buku(){
	$data['buku'] = $this->m_perpus->get_data('buku')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/buku",$data);
	$this->load->view("admin/footer");
}
	
function tambah_buku(){
	$data['kategori'] = $this->m_perpus->get_data('kategori')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/tambah_buku",$data);
	$this->load->view("admin/footer");
}
	
function tambah_buku_act(){
	$tgl_input = date('Y-m-d');
	$id_kategori = $this->input->post('id_kategori');
	$judul_buku = $this->input->post('judul_buku');
	$pengarang = $this->input->post('pengarang');
	$penerbit = $this->input->post('penerbit');
	$thn_terbit = $this->input->post('thn_terbit');
	$isbn = $this->input->post('isbn');
	$jumlah_buku = $this->input->post('jumlah_buku');
	$lokasi = $this->input->post('lokasi');
	$status_buku = $this->input->post('status_buku');
	$this->form_validation->set_rules('id_kategori','Kategori','required');
	$this->form_validation->set_rules('judul_buku','Judul Buku','required');
	$this->form_validation->set_rules('status_buku','Status Buku','required');
	if($this->form_validation->run() !=FALSE){
		//configurasi upload gambar
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|img|image';
			$config['max_size'] = '3072';
			$config['file_name'] = 'gambar'.'time';
		
	$this->load->library('upload',$config);
		
		if($this->upload->do_upload('gambar')){
			$gambar=$this->upload->data();
			
			$data = array(
				'id_kategori' => $id_kategori,
				'judul_buku' => $judul_buku,
				'pengarang' => $pengarang,
				'penerbit' => $penerbit,
				'thn_terbit' => $thn_terbit,
				'isbn' => $isbn,
				'jumlah_buku' => $jumlah_buku,
				'lokasi' => $lokasi,
				'gambar' => $gambar['file_name'],
				'tgl_input' => $tgl_input,
				'status_buku' => $status_buku
				);
			
			$this->m_perpus->insert_data($data,'buku');
			redirect(base_url().'admin/buku');
		}else{
			if($this->session->set_flashdata('alert','Anda Belum Memilih Foto'));
		}
	}else{
	$data['kategori'] = $this->m_perpus->get_data('kategori')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/tambah_buku",$data);
	$this->load->view("admin/footer");
	}
}

function edit_buku($id){
$where = array('id_buku' => $id);
	$data['buku'] = $this->db->query("select * from buku B, kategori K where B.id_kategori=K.id_kategori and B.id_buku='$id'")->result();
	$data['kategori'] = $this->m_perpus->get_data('kategori')->result();
	$data['buku'] = $this->m_perpus->edit_data($where,'buku')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/edit_buku",$data);
	$this->load->view("admin/footer");
}

function update_buku(){
	$id = $this->input->post('id');
	$id_kategori = $this->input->post('id_kategori');
	$judul_buku = $this->input->post('judul_buku');
	$pengarang = $this->input->post('pengarang');
	$penerbit = $this->input->post('penerbit');
	$thn_terbit = $this->input->post('thn_terbit');
	$isbn = $this->input->post('isbn');
	$jumlah_buku = $this->input->post('jumlah_buku');
	$lokasi = $this->input->post('lokasi');
	$status_buku = $this->input->post('status_buku');
	$this->form_validation->set_rules('id_kategori','Kategori','required');
	$this->form_validation->set_rules('judul_buku','Judul Buku','required');
	$this->form_validation->set_rules('pengarang','Pengarang','required|min_length[4]');
	$this->form_validation->set_rules('penerbit','Penerbit','required|min_length[4]');
	$this->form_validation->set_rules('thn_terbit','Tahun Terbit','required|min_length[4]');
	$this->form_validation->set_rules('isbn','ISBN','required|numeric');
	$this->form_validation->set_rules('jumlah_buku','Jumlah Buku','required|numeric');
	
	if($this->form_validation->run() !=FALSE){
		//configurasi upload gambar
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|img|image';
			$config['max_size'] = '3072';
			$config['file_name'] = 'gambar'.'time';
	$this->load->library('upload',$config);
		
			$where = array('id_buku' => $id);
			$data = array(
				'id_kategori' => $id_kategori,
				'judul_buku' => $judul_buku,
				'pengarang' => $pengarang,
				'penerbit' => $penerbit,
				'thn_terbit' => $thn_terbit,
				'isbn' => $isbn,
				'jumlah_buku' => $jumlah_buku,
				'lokasi' => $lokasi,
				'gambar' => $gambar['file_name'],
				'tgl_input' => $tgl_input,
				'status_buku' => $status_buku
				);
		
			if($this->upload->do_upload('gambar')){
				//proses upload gambar
			$gambar=$this->upload->data();
				unlink('./assets/upload/'.$this->input->post('old_pict', TRUE));
				$data['gambar'] = $gambar['file_name'];
				
				$this->m_perpus->update_data($where, $data,'buku');
			}else{
				$this->m_perpus->update_data($where, $data,'buku');
			}
				$this->m_perpus->update_data($where, $data,'buku');
		redirect(base_url().'admin/buku?pesan=berhasil');
	}else{
		$where =array('id_buku' => $id);
	$data['buku'] = $this->db->query("select * from buku B, kategori K where B.id_kategori=K.id_kategori and B.id_buku='$id'")->result();
	$data['kategori'] = $this->m_perpus->get_data('kategori')->result();
	$data['peminjaman'] = $this->m_perpus->edit_data($where,'peminjaman')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/edit_buku",$data);
	$this->load->view("admin/footer");
}
}

function hapus_buku($id){
	$this->db->where('id_buku',$id);
	$this->db->delete(buku);
	redirect(base_url().'admin/buku');
}	

function anggota(){
	$data['anggota'] = $this->m_perpus->get_data('anggota')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/anggota",$data);
	$this->load->view("admin/footer");
}

function tambah_anggota(){
	$this->load->view("admin/header");
	$this->load->view("admin/tambah_anggota");
	$this->load->view("admin/footer");
}
function tambah_anggota_act(){
	$nama_anggota = $this->input->post('nama_anggota');
	$gender = $this->input->post('gender');
	$no_tlpn = $this->input->post('no_tlpn');
	$alamat = $this->input->post('alamat');
	$email = $this->input->post('email');
	$username = $this->input->post('username');
	$isbn = $this->input->post('pass');
	$pass = $this->input->post('pass_konfirm');
	$pass_konfirm = $this->input->post('pass_konfirm');
	$this->form_validation->set_rules('nama_anggota','Nama','required');
	$this->form_validation->set_rules('no_tlpn','Nomor Telepon','required|numeric');
	$this->form_validation->set_rules('alamat','Alamat','required');
	$this->form_validation->set_rules('email','Email','required');
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('pass','Password','required|matches[pass]');
	$this->form_validation->set_rules('pass_konfirm','Konfirmasi Password','required');
	if($this->form_validation->run() !=FALSE){
		
		$data = array(
		'nama_anggota' => $nama_anggota,
		'gender' => $gender,
		'no_tlpn' => $no_tlpn,
		'alamat' => $alamat,
		'email' => $email,
		'username' => $username,
		'password' => md5($pass)
		);
		$this->m_perpus->insert_data($data,'anggota');
		redirect(base_url().'admin/anggota');
}else{
	$this->load->view("admin/header");
	$this->load->view("admin/tambah_anggota");
	$this->load->view("admin/footer");
	}
}

function edit_anggota($id){
$where = array('id_anggota' => $id);
	$data['anggota'] = $this->m_perpus->edit_data($where,'anggota')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/edit_anggota",$data);
	$this->load->view("admin/footer");
}

function update_anggota(){
	$id = $this->input->post('id');
	$nama_anggota = $this->input->post('nama_anggota');
	$gender = $this->input->post('gender');
	$no_tlpn = $this->input->post('no_tlpn');
	$alamat = $this->input->post('alamat');
	$email = $this->input->post('email');
	$this->form_validation->set_rules('nama_anggota','Nama','required');
	$this->form_validation->set_rules('no_tlpn','Nomor Telepon','required|numeric');
	$this->form_validation->set_rules('alamat','Alamat','required');
	$this->form_validation->set_rules('email','Email','required');
	if($this->form_validation->run() !=FALSE){
	
		$where = array('id_anggota' => $id);
			$data = array(
				'nama_anggota' => $nama_anggota,
				'gender' => $gender,
				'no_tlpn' => $no_tlpn,
				'alamat' => $alamat,
				'email' => $email
				);
		
				$this->m_perpus->update_data($where, $data,'anggota');
		redirect(base_url().'admin/update_anggota');
			}else{
		redirect(base_url().'admin/anggota?pesan=berhasil');
		$where =array('id_anggota' => $id);
	$data['anggota'] = $this->m_perpus->edit_data($where,'anggota')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/edit_anggota",$data);
	$this->load->view("admin/footer");
}
}

function hapus_anggota($id){
	$this->db->where('id_anggota',$id);
	$this->db->delete(anggota);
	redirect(base_url().'admin/anggota');
}	

function peminjaman(){
	
	$data['peminjaman'] = $this->db->query("SELECT * FROM transaksi T, buku B, anggota A WHERE T.id_buku=B.id_buku and T.id_anggota=A.id_anggota")->result();
	
	$this->load->view("admin/header");
	$this->load->view("admin/peminjaman",$data);
	$this->load->view("admin/footer");
}

function tambah_peminjaman(){
	
	$w = array('status_buku'=>'1');
	$data['buku'] = $this->m_perpus->edit_data($w,'buku')->result();
	$data['anggota'] = $this->m_perpus->get_data('anggota')->result();
	$data['peminjaman'] = $this->m_perpus->get_data('transaksi')->result();

	$this->load->view("admin/header");
	$this->load->view("admin/tambah_peminjaman",$data);
	$this->load->view("admin/footer");
}


function tambah_peminjaman_act(){
	$tgl_pencatatan = date('Y-m-d H:i:s');
	$anggota = $this->input->post('id_anggota');
	$buku = $this->input->post('id_buku');
	$tgl_pinjam = $this->input->post('tgl_pinjam');
	$tgl_kembali = $this->input->post('tgl_kembali');
	$denda = $this->input->post('denda');
	$this->form_validation->set_rules('id_anggota','Anggota','required');
	$this->form_validation->set_rules('id_buku','Buku','required');
	$this->form_validation->set_rules('tgl_pinjam','Tanggal Pinjam','required');
	$this->form_validation->set_rules('tgl_kembali','Tanggal Kembali','required');
	$this->form_validation->set_rules('denda','Denda','required');
	
	if($this->form_validation->run() !=false){
		$data = array(
			'id_pinjam' => $this->m_perpus->kode_otomatis(),
			'tgl_pencatatan' => date('Y-m-d'),
			'id_anggota' => $anggota,
			'id_buku' => $buku,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'denda' => $denda,
			'tgl_pengembalian' => '0000-00-00',
			'total_denda' => '0',
			'status_pengembalian' => 'Belum Kembali',
			'status_peminjaman' =>'0'
		);
		$this->m_perpus->insert_data($data,'transaksi');
		
	$data2 = array(
			'id_pinjam' => $this->m_perpus->kode_otomatis(),
			'tgl_pencatatan' => date('Y-m-d'),
			'id_anggota' => $anggota,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'total_denda' => '0',
			'status_peminjaman' => '0',
			'status_pengembalian' => 'Belum Kembali'
		);
		$this->m_perpus->insert_data($data2,'peminjaman');
		
	$data3 = array(
			'id_pinjam' => $this->m_perpus->kode_otomatis(),
			'id_buku' => $buku,
			'denda' => $denda
			);
		$this->m_perpus->insert_data($data3,'detail_pinjam');
		
		//update status buku yang dipinjam
		$d = array('status_buku' => '0','tgl_input' => substr($tgl_pencatatan,0,10));
		$w = array('id_buku' => $buku);
		
		$this->m_perpus->update_data($w,$d,'buku');
		
		redirect(base_url().'admin/peminjaman');
	}else{
		$w = array('status_buku' => '1');
		$data['buku'] = $this->m_perpus->edit_data($w,'buku')->result();
		$data['anggota'] = $this->m_perpus->get_data('anggota')->result();
	$this->load->view("admin/header");
	$this->load->view("admin/tambah_peminjaman",$data);
	$this->load->view("admin/footer");
	}
}

	function hapus_peminjaman($id){
		$w = array('id_pinjam' => $id);
		$data1 = $this->m_perpus->edit_data($w,'transaksi')->row();
		$data2 = $this->m_perpus->edit_data($w,'peminjaman')->row();
		$ww = array('id_buku' => $data->id_buku);
		$data3 = array('status_buku' => '1');
		$this->m_perpus->update_data($ww,$data3,'buku');
		$this->m_perpus->delete_data($w, 'transaksi');
		$this->m_perpus->delete_data($w, 'peminjaman');
		redirect(base_url().'admin/peminjaman');
	}

	function peminjaman_selesai($id){
		$data['buku'] = $this->m_perpus->get_data('buku')->result();
		$data['anggota'] = $this->m_perpus->get_data('anggota')->result();
		$data['peminjaman'] = $this->db->query("select * from transaksi t, anggota a, buku b where t.id_buku 
			= b.id_buku and t.id_anggota=a.id_anggota and t.id_pinjam='$id'")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/transaksi_selesai',$data);
		$this->load->view('admin/footer');
	}

function peminjaman_selesai_act(){

	$id =  $this->input->post('id');
	$tgl_dikembalikan =  $this->input->post('tgl_dikembalikan');
	$tgl_kembali =  $this->input->post('tgl_kembali');
	$buku =  $this->input->post('buku');
	$denda = $this->input->post('denda');
	$this->form_validation->set_rules('tgl_dikembalikan','tanggal Di Kembalikan','required');
	if ($this->form_validation->run() !=false) {
			
		// menghitung selisih hari
			$batas_kembali = strtotime($tgl_kembali);
			$dikembalikan = strtotime($tgl_dikembalikan);
			$selisih = abs(($batas_kembali - $dikembalikan)/(60*60*24));
			$total_denda = $denda*$selisih;
			
		// update status peminjaman
			$data = array('status_peminjaman' =>'1',
						  'total_denda'=>$total_denda,
						  'tgl_pengembalian' =>$tgl_dikembalikan,
						  'status_pengembalian' =>'1'
						 );
			
			$data2 = array(
			'id_pinjam' => $id_pinjam,
			'id_buku' => $buku,
			'denda' => $denda,
			);
			$w = array('id_pinjam' =>$id);
			$this->m_perpus->update_data($w,$data,'transaksi','peminjaman');
			$this->m_perpus->update_data($w,$data2,'detail_pinjam');
			
		// update status buku
			$data3 = array('status_buku' =>'1');
			$w3 = array('id_buku' => $buku);
			$this->m_perpus->update_data($w3,$data3,'buku');
			redirect(base_url().'admin/peminjaman');
			
		}else{
			
			$data['buku'] = $this->m_perpus->get_data('buku')->result();
			$data['anggota'] = $this->m_perpus->get_data('anggota')->result();
			$data['peminjaman'] = $this->db->query("select * from peminjaman p, anggota a, detail_pinjam d,b.id_buku and p.id_pinjam='$id'")->result();

$this->load->view('admin/header');
$this->load->view('admin/transaksi_selesai',$data);
$this->load->view('admin/footer');
		}
	}

function cetak_laporan_buku(){
	
	$data['buku'] = $this->m_perpus->get_data('buku')->result();
	
	$this->load->view("admin/header");
	$this->load->view("admin/laporan_buku",$data);
	$this->load->view("admin/footer");
}

function laporan_print_buku(){
	$data['buku'] = $this->m_perpus->get_data('buku')->result();
	$this->load->view("admin/laporan_print_buku",$data);
}

//Rich Text
function tulis_informasi(){

$this->load->view("admin/header");
$this->load->view("admin/tulis_informasi");
$this->load->view("admin/footer");
}

function tulis_informasi_act(){
	$title = $this->input->post('title');
	$tgl_terbit = $this->input->post('tgl_terbit');
	$content = $this->input->post('content');
	$this->form_validation->set_rules('title','Title','required');
	$this->form_validation->set_rules('content','Content','required');
	if($this->form_validation->run() !=FALSE){
		
		$data = array(
		'title' => $title,
		'tgl_terbit' => $tgl_terbit,
		'content' => $content
		);
		
		$this->m_perpus->insert_data($data,'article');
		redirect(base_url().'admin/informasi');
}else{
	$this->load->view("admin/header");
	$this->load->view("admin/tulis_informasi");
	$this->load->view("admin/footer");
	}
}

function berita($id){
$where = array('id_article' => $id);
	$data['article'] = $this->m_perpus->edit_data($where,'article')->result();

$this->load->view("admin/header");
$this->load->view("admin/berita",$data);
$this->load->view("admin/footer");
}
//End Rich Text
function informasi(){
	$data['article'] = $this->db->query("select * from article order by id_article asc limit 10")->result();
	
$this->load->view("admin/header");
$this->load->view("admin/informasi",$data);
$this->load->view("admin/footer");
}

function ganti_password(){
	$this->load->view("admin/header");
	$this->load->view("admin/ganti_password");
	$this->load->view("admin/footer");
}

function ganti_password_act(){
	$pass_baru = $this->input->post('pass_baru');
	$ulang_pass = $this->input->post('ulang_pass');
	
	$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
	$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');
	if($this->form_validation->run() !=FALSE){
		
		$data = array('password' => md5($pass_baru));
		$w = array('id_admin' => $this->session->userdata('id'));
		$this->m_perpus->update_data($w,$data,'admin');
		redirect(base_url().'admin/ganti_password?pesan=berhasil');
		
	}else{	
			$this->load->view("admin/header");
			$this->load->view("admin/ganti_password");
			$this->load->view("admin/footer");
}

}	
	
function logout(){
	$this->session->sess_destroy();
	redirect(base_url().'welcome?pesan=logout');
}
}
?>
<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
//Cek Login
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'welcome/login?pesan=belumlogin');
	}
}

function index(){
	$data['buku'] = $this->db->query("select * from buku order by id_buku desc limit 4")->result();
	$this->load->view("user/header");
	$this->load->view("user/index",$data);
	$this->load->view("user/footer");
}

function buku(){
	$data['buku'] = $this->m_perpus->get_data('buku')->result();
	$this->load->view("user/header");
	$this->load->view("user/buku",$data);
	$this->load->view("user/footer");
}

function tambah_pinjam($id){
 if($this->session->userdata('status') != "login"){
 redirect(base_url().'welcome/login');
 }else{
 $d = $this->m_perpus->find($id, 'buku');
 $isi = array(
 'id_pinjam' => $this->m_perpus->kode_otomatis(),
 'id_buku' => $id,
 'id_anggota' => $this->session->userdata('id_agt'),
 'tgl_pencatatan' => date('Y-m-d'),
 'tgl_pinjam' => '-',
 'tgl_kembali' => '-',
 'denda' => '1000',
 'tgl_pengembalian' =>'-',
 'total_denda' =>'0',
 'status_peminjaman' =>'0',
 'status_pengembalian' =>'Belum Kembali'
 );
 $o = $this->m_perpus->edit_data(array('id_buku'=>$id),'transaksi')->num_rows();
 if($o>0) {
 $this->session->set_flashdata('alert','Buku ini sudah ada dikeranjang');
 redirect(base_url().'user');
 }
 }
 
 $this->m_perpus->insert_data($isi, 'transaksi');
 $jml_buku = $d->jumlah_buku-1;
 $w=array('id_buku'=>$id);
 $data = array('jumlah_buku'=>$jml_buku);
 $this->m_perpus->update_data($data,$w,'buku');
 redirect(base_url().'user');
 }
 
function lihat_keranjang(){
	$data['anggota'] = $this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
	$where = $this->session->userdata('id_agt');
	$data['peminjaman']= $this->db->query("select*from transaksi t, buku b, anggota a where b.id_buku=t.id_buku and a.id_anggota=t.id_anggota")->result();
	$d=$this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'transaksi')->num_rows();
	if($d > 0){
	$this->load->view('user/header');
	$this->load->view('user/keranjang',$data);
	$this->load->view('user/footer');
	}else{redirect('user');}
 }
 
function hapus_keranjang($id){
		$w = array('id_pinjam' => $id);
		$data1 = $this->m_perpus->edit_data($w,'transaksi')->row();
		$data2 = $this->m_perpus->edit_data($w,'peminjaman')->row();
		$ww = array('id_buku' => $data->id_buku);
		$data3 = array('status_buku' => '1');
		$this->m_perpus->update_data($ww,$data3,'buku');
		$this->m_perpus->delete_data($w, 'transaksi');
		redirect(base_url().'user/lihat_keranjang');
	}

function selesai_booking($where){
	$where = $this->session->userdata('id_agt');
	$d = $this->m_perpus->find($where, 'transaksi');
	$isi = array(
	'id_pinjam' => $this->m_perpus->kode_otomatis(),
	'tgl_pencatatan' => date('Y-m-d H:m:s'),
	'id_anggota' => $where,
	'tgl_pinjam' => '-',
	'tgl_kembali' => '-',
	'total_denda' => '0',
	'status_peminjaman' => '0',
	'status_pengembalian' => 'Belum Kembali'
	);
	
	$this->m_perpus->insert_data($isi, 'peminjaman');
	$this->m_perpus->insert_detail($where);
	$this->m_perpus->kosongkan_data('transaksi');
	$data['anggota'] = $this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
	$data['buku'] = $this->db->query("select * from peminjaman p, detail_pinjam d, buku b where b.id_buku=d.id_buku and d.id_pinjam=p.id_pinjam and p.id_anggota='$where'")->result();

	
$this->load->view('user/header');
$this->load->view('user/info', $data);
$this->load->view('user/footer');
 }
 
function visi_misi(){
	$this->load->view("user/header");
	$this->load->view("user/visi_misi");
	$this->load->view("user/footer");
}

function informasi($id){
$where = array('id_article' => $id);
	$data['article'] = $this->m_perpus->edit_data($where,'article')->result();

$this->load->view("user/header");
$this->load->view("user/informasi",$data);
$this->load->view("user/footer");
}

function ganti_password(){
	$this->load->view("user/header");
	$this->load->view("user/ganti_password");
	$this->load->view("user/footer");
}

function ganti_password_act(){
	$pass_baru = $this->input->post('pass_baru');
	$ulang_pass = $this->input->post('ulang_pass');
	
	$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
	$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');
	if($this->form_validation->run() !=FALSE){
		
		$data = array('password' => md5($pass_baru));
		$w = array('id_anggota' => $this->session->userdata('id'));
		$this->m_perpus->update_data($w,$data,'anggota');
		redirect(base_url().'user/ganti_password?pesan=berhasil');
		
	}else{	
			$this->load->view("user/header");
			$this->load->view("user/ganti_password");
			$this->load->view("user/footer");
}

}	
	
function logout(){
	$this->session->sess_destroy();
	redirect(base_url().'welcome?pesan=logout');
}
}
?>
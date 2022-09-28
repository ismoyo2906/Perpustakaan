<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Welcome extends CI_Controller{
	function __construct(){
		parent::__construct();
}
public function index(){
	$data['buku'] = $this->db->query("select * from buku order by id_buku desc limit 4")->result();
	$data['anggota'] = $this->m_perpus->get_data('anggota')->result();
	
	$this->load->view("header");
	$this->load->view("index",$data);
	$this->load->view("footer");
}

public function buku(){
	$data['buku'] = $this->m_perpus->get_data('buku')->result();
	$this->load->view("header");
	$this->load->view("buku",$data);
	$this->load->view("footer");
}

public function visi_misi(){
	$this->load->view("header");
	$this->load->view("visi_misi");
	$this->load->view("footer");
}

public function login(){
	$this->load->view("login");
}
public function login_act(){
	$username = $this->input->post("username");
	$password = $this->input->post("password");
	$this->form_validation->set_rules("username","Username","trim|required");
	$this->form_validation->set_rules("password","Password","trim|required");
	
	if($this->form_validation->run() !=FALSE){
		$where = array('username' => $username, 'password' => md5($password));
		
		$data = $this->m_perpus->edit_data($where, 'admin');
		$d = $this->m_perpus->edit_data($where, 'admin')->row();
		$cek = $data->num_rows();
	if($cek > 0){
		$session = array('id' => $d->id_admin, 'name' => $d->nama_admin, 'sts' => 'login');
		$this->session->set_userdata($session);
		redirect(base_url().'admin');
	}else{
		$dt = $this->m_perpus->edit_data($where, 'anggota');
		$hasil = $this->m_perpus->edit_data($where, 'anggota')->row();
		$proses = $dt->num_rows();
	if($proses > 0){
		$session = array('id_agt' => $hasil->id_anggota, 'nama' => $hasil->username, 'status' => 'login');
		$this->session->set_userdata($session);
		redirect(base_url().'user');
	}
	 else{
		 $this->session->flashdata('alert','Login gagal! Username atau Password salah.');
		 redirect(base_url().'welcome/login?pesan=gagal');

		}
	}
	}else{
		$this->session->flashdata('alert','Anda Belum Mengisi Username atau Password.');
		redirect(base_url().'welcome/login?pesan=belumlogin');
		$this->load->view('login');
	  }
	}

public function register(){
	$this->load->view('register_anggota');
}

public function register_anggota_act(){
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
		'username' => $username,
		'password' => md5($pass)
		);
		$this->m_perpus->insert_data($data,'anggota');
		redirect(base_url().'welcome');
}else{
	$this->load->view('register_anggota');
	}
}

  }
?>
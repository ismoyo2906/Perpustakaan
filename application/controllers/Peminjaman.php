<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');
class Peminjaman extends CI_Controller{
 function __construct(){
 parent::__construct();
 
 // cek login
 if($this->session->userdata('status') != "login"){
 
 redirect(base_url().'welcome/login');
 }
 }
 function index(){
 $data['peminjaman'] = $this->db->query("SELECT * FROM detail_pinjam d,peminjaman p, buku b, anggota a WHERE b.id_buku=d.id_buku and a.id_anggota=p.id_anggota")->result();
 $this->load->view('user/header');
 $this->load->view('admin/peminjaman',$data);
 $this->load->view('user/footer');
 }
 //one to many
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
 'denda' => '10000',
 'tgl_pengembalian' =>'-',
 'total_denda' =>'0',
 'status_peminjaman' =>'Belum Selesai',
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
 $this->m_perpus->update_data('buku', $data,$w);
 redirect(base_url().'user');
 }
 
function lihat_keranjang(){
 $data['anggota'] = $this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
 $where = $this->session->userdata('id_agt');
 $data['peminjaman']= $this->db->query("select*from transaksi t, buku b, anggota a where b.id_buku=b.id_buku and a.id_anggota=t.id_anggota")->result();
 $d=$this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'transaksi')->num_rows();
 if($data > 0){
 $this->load->view('user/header');
 $this->load->view('user/keranjang',$data);
 $this->load->view('user/footer');
 }else{redirect('user');}
 }
 }
 ?>
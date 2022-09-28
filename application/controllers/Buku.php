<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');
class Buku extends CI_Controller{
	function __construct(){
		parent::__construct();
}
	public function katalog_detail(){
		$id = $this->uri->segment(3);
		$buku = $this->db->query("select*from buku b, kategori k where b.id_kategori=k.id_kategori AND b.id_buku='$id'")->result();
		

		foreach ($buku as $b) {
		$data['judul'] = $b->judul_buku;
		$data['pengarang'] = $b->pengarang;
		$data['penerbit'] = $b->penerbit;
		$data['kategori'] = $b->nama_kategori;
		$data['tahun'] = $b->thn_terbit;
		$data['isbn'] = $b->isbn;
		$data['gambar'] = $b->gambar;
		$data['id'] = $id;
		}
			$this->load->view("user/header");
			$this->load->view("user/detail_buku",$data);
			$this->load->view("user/footer");
		}
}
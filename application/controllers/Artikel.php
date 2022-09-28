<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Artikel extends CI_Controller{
	function __construct(){
		parent::__construct();
}

function index(){

$this->load->view("artikel/header");
$this->load->view("artikel/index");
$this->load->view("artikel/footer");
}

function index_act(){
	$title = $this->input->post('title');
	$content = $this->input->post('content');
	$this->form_validation->set_rules('title','Nama Kategori','required');
	$this->form_validation->set_rules('content','Nama Kategori','required');
	if($this->form_validation->run() !=FALSE){
		
		$data = array(
		'title' => $title,
		'content' => $content
		);
		
		$this->m_perpus->insert_data($data,'article');
		redirect(base_url().'artikel/index');
}else{
	$this->load->view("artikel/header");
	$this->load->view("artikel/index");
	$this->load->view("artikel/footer");
	}
}

}
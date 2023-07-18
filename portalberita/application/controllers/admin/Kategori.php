<?php
class Kategori extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_kategori');
		$this->load->library('upload');
	}


	function index(){
		$data['data']=$this->M_kategori->get_all_kategori();
		$this->load->view('admin/v_kategori',$data);

		//$this->load->database();
		//$query = $this->db->get_all_kategori('admin/v_kategori');
		//$data['admin/v_kategori']=$query->result_array();
		//$this->load->view('admin/v_kategori',$data);

		//$query = $this->M_kategori->get_all_kategori();
		//$data['data']=$query; 
		//$this->load->view('admin/v_kategori',$data);
	}

	function simpan_kategori(){
		$kategori=strip_tags($this->input->post('xkategori'));
		$this->M_kategori->simpan_kategori($kategori);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/kategori');
	}

	function update_kategori(){
		$kode=strip_tags($this->input->post('kode'));
		$kategori=strip_tags($this->input->post('xkategori'));
		$this->M_kategori->update_kategori($kode,$kategori);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/kategori');
	}
	function hapus_kategori(){
		$kode=strip_tags($this->input->post('kode'));
		$this->M_kategori->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/kategori');
	}
	
}
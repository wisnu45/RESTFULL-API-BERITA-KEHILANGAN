<?php
class Mahasiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_mahasiswa');
		$this->load->library('upload');
	}


	function index(){
		
		$x['data']=$this->M_mahasiswa->get_all_mahasiswa();
		$this->load->view('admin/v_mahasiswa',$x);
	
	}

	function kirim_pesan(){
		
		$nim=htmlspecialchars($this->input->post('nim',TRUE),ENT_QUOTES);
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pass=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$this->M_mahasiswa->kirim_pesan($nim,$nama,$email,$pass);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-info'>Anda Berhasil Terdaftar</div>");
		redirect('kontak');
	}

	function hapus_mahasiswa(){
		$kode=strip_tags($this->input->post('kode'));
		$this->M_mahasiswa->hapus_mahasiswa($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/mahasiswa');
	}

}
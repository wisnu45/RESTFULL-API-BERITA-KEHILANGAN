<?php
class pesan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('user');
            redirect($url);
        };
		$this->load->model('M_kirimpesan');
		$this->load->library('upload');
	}


	function index(){
		
		$x['data']=$this->M_kirimpesan->get_all_inbox();
		$this->load->view('user/v_kirimpesan',$x);
	
	}

	function simpan_pesan(){
		
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pesan=htmlspecialchars($this->input->post('pesan',TRUE),ENT_QUOTES);
		$this->M_kirimpesan->simpan_pesan($nama,$email,$pesan);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-info'>Pesan Anda Berhasil Terkirim</div>");
		redirect('user/pesan');
	}

	
	function hapus_pengumuman(){
		$kode=strip_tags($this->input->post('kode'));
		$this->M_info->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/info');
	}

}
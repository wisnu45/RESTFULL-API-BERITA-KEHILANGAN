<?php
class mahasiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('user/user');
            redirect($url);
        };
		$this->load->model('M_mahasiswa');
		$this->load->library('upload');
	}


	function index(){
		
		$x['data']=$this->M_mahasiswa->get_all_mahasiswa();
		$this->load->view('user/v_datamhs',$x);
	
	}


	function update_mhs(){
		$kode=strip_tags($this->input->post('kode'));
		$nim=strip_tags($this->input->post('nim'));
		$nama=strip_tags($this->input->post('nama'));
		$email=strip_tags($this->input->post('email'));
		$pass=strip_tags($this->input->post('password'));
		$this->M_mahasiswa->update_mhs($kode,$nim,$nama,$email,$pass);
		echo $this->session->set_flashdata('msg','succes');
		redirect('user/mahasiswa');
	}
	function hapus_pengumuman(){
		$kode=strip_tags($this->input->post('kode'));
		$this->M_info->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/info');
	}

}
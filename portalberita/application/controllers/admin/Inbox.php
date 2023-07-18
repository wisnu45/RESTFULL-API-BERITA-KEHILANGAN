<?php
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_kirimpesan');
	}

	function index(){
		$this->M_kirimpesan->update_status_kontak();
		$x['data']=$this->M_kirimpesan->get_all_inbox();
		$this->load->view('admin/v_inbox',$x);
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->M_kirimpesan->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/inbox');
	}
}
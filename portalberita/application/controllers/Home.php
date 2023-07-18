<?php 
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_tulisan');
		//$this->load->model('M_album');
		$this->load->model('M_pengunjung');
        // $this->M_pengunjung->count_visitor();
	}
	function index(){
		$x['data']=$this->M_tulisan->get_post_home();
		//$x['album']=$this->M_album->get_all_album();
		$this->load->view('v_home',$x);
	}

	function about(){
		$this->load->view('v_pendaftaran');
	}


}
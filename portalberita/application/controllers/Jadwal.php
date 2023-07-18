<?php 
class jadwal extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_pengunjung');
        $this->M_pengunjung->count_visitor();
	}

	function index(){
		$this->load->view('v_jadwal');
	}
}
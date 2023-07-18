<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('user/user');
            redirect($url);
        };
	
	}
	function index(){
			$this->load->view('user/v_Dashboard');
	
	}
	
}
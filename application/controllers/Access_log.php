<?php 

class Access_log extends Admin_Controller{

	public function __construct(){
		parent::__construct();
        $this->data['page_title'] = 'Access Log';
		$this->data['c'] = 'Access log';
		$this->data['m'] = '';
		$this->data['page_desc'] = '';
		
	
		
	}

	public function index(){
		$user_id = $this->session->userdata('user_id');
		$this->data['logs'] = $this->access_log_m->get();
		
		$this->data['subview'] = 'access_log/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}
	
 

}
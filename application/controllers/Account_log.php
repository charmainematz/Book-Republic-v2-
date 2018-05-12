<?php 

class Account_log extends Admin_Controller{

	public function __construct(){
		parent::__construct();
        $this->data['page_title'] = 'Account Log';
		$this->data['c'] = 'Account log';
		$this->data['m'] = '';
		$this->data['page_desc'] = '';
		
	
		
	}

	public function index(){
		$user_id = $this->session->userdata('user_id');
		$this->data['logs'] = $this->account_log_m->get_logs($user_id);
		
		$this->data['subview'] = 'account_log/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}
	
 

}
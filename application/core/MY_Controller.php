<?php 

class MY_Controller extends CI_Controller {
	
	public $data = array();
	function __construct(){
		parent::__construct();
		$this->data['errors'] = array();
		$this->data['site_name'] = config_item('site_name');
		$this->data['site_desc'] = config_item('site_desc');

		date_default_timezone_set('Asia/Manila');
	}
	

}
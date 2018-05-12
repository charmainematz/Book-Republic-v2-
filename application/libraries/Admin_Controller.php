<?php 
class Admin_Controller extends MY_Controller{

	
	function __construct(){
		parent::__construct();
		$this->data['app_title'] = "Book Republic";
	
		$this->data['version'] = '1.0.1';
		$this->load->helper('form');
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');


		
		

		// Login check
		$exception_uris = array(
			'auth/home', 
			'auth/forgot_password', 
			'auth/loginwithfacebook', 
			'auth/facebookLogout', 
			'auth/reset_password',
			'auth/register', 
			'auth/create_user', 
			'auth/login', 
			'collection/index', 
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if (!$this->ion_auth->logged_in()) {
				if($this->input->post('home')=='Browse Collection'){
					redirect('collection');
				}
				if($this->input->post('homebutton2')=='Register'){
					redirect('auth/create_user', 'refresh');
				}
				else{
					redirect('auth/home');

				}
				
			}
		}

		if ($this->ion_auth->logged_in()) {
			$user_id = $this->session->userdata('user_id');
			$this->data['user'] =$this->ion_auth_model->user_details($user_id);
			$this->data['group_name'] =   $this->ion_auth->get_users_groups()->row()->name;
		}

		

		
	
	

	}
}
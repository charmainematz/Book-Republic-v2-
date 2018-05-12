<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Dashboard extends Admin_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();
		//$this->load->model('personnel_m');
		$this->data['page_title'] = 'Dashboard';
		$this->data['page_desc'] ='';
	
	
	}

	public function index(){
		
		$this->data['m'] = '';
		$this->data['c'] = 'dashboard';
		$this->data['page_title'] ='Dashboard';
		$this->data['books'] = $this->book_m->get_Books();
		$this->data['borrowed_books'] = $this->book_m->get_borrowed_books();

		$this->data['genres'] = $this->genre_m->get_genres();
		$this->data['friend_requests'] = $this->friend_request_m->get_my_friend_request($this->session->userdata('user_id'));
		$this->data['borrow_requests'] = $this->borrow_request_m->get_my_borrow_request($this->session->userdata('user_id'));
		$this->data['swap_requests'] = $this->swap_request_m->get_my_swap_request($this->session->userdata('user_id'));
		$this->data['book_conditions'] = $this->book_condition_m->get_book_conditions();
		

		$this->data['user'] = $this->ion_auth->user()->row();
		
		if ($this->ion_auth->is_admin()) {
			 $user=$this->ion_auth->user()->row();
			
		

			$this->data['subview'] = 'dashboard/index';
			$this->load->view('layouts/_layout_main',$this->data);
		}else{
		$this->data['subview'] = 'dashboard/user_dashboard';
			$this->load->view('layouts/_layout_main',$this->data);
			
		
		}
			
		

	}

	public function upload(){

		 if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
           
        }

        redirect('dashboard');

	}

	public function load_analytics(){
		$this->data['vacant'] = $this->room_m->get_vacant();
	    $this->data['occupied'] = $this->room_m->get_occupied();
	    $this->data['inclusions'] = $this->inclusion_m->get();
	    $this->data['rooms'] = $this->room_m->get();
	    $this->data['checkins'] = $this->reservation_m->getCurrentReservations();  
	    $this->data['checkouts'] = $this->reservation_m->getCurrentCheckouts();  
		$this->data['m'] = '';
		$this->data['c'] = 'dashboard';
		$this->data['page_title'] ='Analytics';
			$this->data['subview'] = 'dashboard/analytics';
			$this->load->view('layouts/_layout_main',$this->data);
	}
	 private function _do_upload()
	
    {
        $config['upload_path']          = 'assets/example-images/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = 'dashboard-header.jpg'; //just milisecond timestamp fot unique name
        $config['overwrite'] = TRUE;
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
	
	
}
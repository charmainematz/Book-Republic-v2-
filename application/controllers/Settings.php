<?php 

class Settings extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Masterlist';
		
		$this->data['m'] = '';
		$this->data['page_desc'] = 'Control Panel';
         $this->load->model('room_type_m');
         $this->load->model('addon_m');
           $this->load->model('status_m');
	    $this->load->model('room_m');
	    $this->load->model('room_photo_m');
	    $this->load->model('inclusion_m');
	     $this->load->model('facility_m');
			
	}

	public function index(){
		 $this->data['room_types'] = $this->room_type_m->get_room_types();
		 $this->data['addons'] = $this->addon_m->get();
   		 $this->data['vacant'] = $this->room_m->get_vacant();
    	$this->data['occupied'] = $this->room_m->get_occupied();
   	 	$this->data['inclusions'] = $this->inclusion_m->get();
   	 	$this->data['room_inclusions'] = $this->room_inclusion_m->get_inclusions();
    	$this->data['rooms'] = $this->room_m->get();
    	$this->data['facilities'] = $this->facility_m->get();
    	$this->data['status'] = $this->status_m->get();
		$this->data['subview'] = 'settings/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}

	

}
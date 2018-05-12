<?php 

class Genre extends Admin_Controller{

	public function __construct(){
		parent::__construct();
        $this->data['page_title'] = 'Genre';
		$this->data['c'] = 'Genres';
		$this->data['m'] = '';
		$this->data['page_desc'] = 'List of Genre';
		
	
		
	}

	public function index(){
		$this->data['page_title'] = 'Genre';
		$this->data['m'] = 'List of Genres';
		$this->data['genres'] = $this->genre_m->get();
		$this->data['subview'] = 'genre/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}
 

}
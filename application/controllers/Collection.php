<?php 

class Collection extends Admin_Controller{

	public function __construct(){
		parent::__construct();
        $this->data['page_title'] = 'Collections';
		$this->data['c'] = 'Library';
		$this->data['m'] = '';
		$this->data['page_desc'] = 'Browse all books';
		
	
		
	}

	public function index(){


		
			$this->data['page_title'] = 'Collections';
			$this->data['books'] = $this->book_m->get_Books();
			$this->data['book_conditions'] = $this->book_condition_m-> get_book_conditions();
	
			$this->data['genres'] = $this->genre_m->get_genres();
			$this->data['subview'] = 'collection/index';
			$this->load->view('layouts/browse_layout',$this->data);


		
	
	
		
	}
   

}
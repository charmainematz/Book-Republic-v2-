<?php 

class Author extends Admin_Controller{

	public function __construct(){
		parent::__construct();
        $this->data['page_title'] = 'Author';
		$this->data['c'] = 'Authors';
		$this->data['m'] = '';
		$this->data['page_desc'] = 'List of Authors';
		
	
		
	}

	public function index(){
		$this->data['page_title'] = 'Authors';
		$this->data['m'] = 'List of Authors';
		$this->data['authors'] = $this->author_m->get();
		
		$this->data['subview'] = 'author/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}
	
 	public function get_authors(){
		
		$data =array();
		$authors = $this->author_m->get();

		foreach($authors as $author){
			$data = $author->author_name;
		}
		
		echo json_encode($data);
	}

}
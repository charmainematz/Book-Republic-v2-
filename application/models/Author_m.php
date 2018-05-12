<?php 
class Author_m extends MY_Model{

	protected $_table_name = 'authors';
	protected $_order_by = 'authors.author_name asc';
	protected $_primary_key = 'authors.author_id';
	protected $_primary_filter = 'intval'; //strval


	function __construct()
	{
		parent::__construct();
	}
	
	public function get_Bookshelf($id)
	{
		$this->db->select('books.*,authors.*,users.*, genre.*,book_condition.*');
		$this->db->join('authors','books.author_id=authors.author_id');
		$this->db->join('users','books.owner_id=users.id');		
		$this->db->join('genre','books.genre_id=genre.genre_id');
		$this->db->join('book_condition','books.book_condition_id=book_condition.book_condition_id');
		$this->db->where('users.id',$id);		
		return parent::get();
	}

	public function author_exists($name)
	{
		$this->db->select('*');
	    $this->db->where('author_name',$name);
	  	return parent::get();	   
	}
	
	public function get_author_id($name){

		$this->db->select('*');
	    $this->db->where('author_name',$name);
	  	return parent::get();
	}
}
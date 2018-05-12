<?php 
class book_m extends MY_Model{

	protected $_table_name = 'books';
	protected $_order_by = 'books.date_added desc';
	protected $_primary_key = 'books.book_id';
	protected $_primary_filter = 'intval'; //strval


	function __construct()
	{
		parent::__construct();
	}
	public function get_Books()
	{
		$this->db->select('books.*,authors.*,users.*, genre.*,book_condition.*');
		$this->db->join('authors','books.author_id=authors.author_id');
		$this->db->join('users','books.owner_id=users.id');		
		$this->db->join('genre','books.genre_id=genre.genre_id');
		$this->db->join('book_condition','books.book_condition_id=book_condition.book_condition_id');


		return parent::get();
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
	public function get_Books_By_Author($author_id)
	{
		$this->db->select('books.*,authors.*,users.*, genre.*,book_condition.*');
		$this->db->join('authors','books.author_id=authors.author_id');
		$this->db->join('users','books.owner_id=users.id');		
		$this->db->join('genre','books.genre_id=genre.genre_id');
		$this->db->join('book_condition','books.book_condition_id=book_condition.book_condition_id');
			$this->db->where('authors.author_id',$author_id);		


		return parent::get();
	}

	public function get_Book($id)
	{
		$this->db->select('books.*,authors.*,users.*, genre.*,book_condition.*');
		$this->db->join('authors','books.author_id=authors.author_id');
		$this->db->join('users','books.owner_id=users.id');		
		$this->db->join('genre','books.genre_id=genre.genre_id');
		$this->db->join('book_condition','books.book_condition_id=book_condition.book_condition_id');
		$this->db->where('books.book_id',$id);	

		return parent::get();
	}
	public function get_borrowed_books()
	{
		$this->db->select('books.*,authors.*,users.*, genre.*,book_condition.*,book_borrows.*,borrow_request.*');
	
		$this->db->join('borrow_request','books.book_id=borrow_request.book_id');
		
		$this->db->join('book_borrows','books.book_id=book_borrows.book_id');
		$this->db->join('authors','books.author_id=authors.author_id');
		$this->db->join('users','books.owner_id=users.id');		
		$this->db->join('genre','books.genre_id=genre.genre_id');
		$this->db->join('book_condition','books.book_condition_id=book_condition.book_condition_id');
		return parent::get();
	
	}
	
}
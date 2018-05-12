<?php 
class Book_condition_m extends MY_Model{

	protected $_table_name = 'book_condition';
	protected $_order_by = 'book_condition.book_condition_name asc';
	protected $_primary_key = 'book_condition.book_condition_id';
	protected $_primary_filter = 'intval'; //strval

	
	function __construct()
	{
		parent::__construct();
	}

	public function get_book_conditions ()
	{
		// Fetch pages without parents
		$this->db->select('*');
		
		$types = parent::get();
		
		// Return key => value pair array
		$array = array(
			'' => 'Select Condition'
		);
		if (count($types)) {
			foreach ($types as $type) {
				$array[$type->book_condition_id] = $type->book_condition_name;
			}
		}
		
		return $array;
	}

	public function getconditions()
	{
		// Fetch pages without parents
		$this->db->select('*');
		
		return parent::get();
		
		
		
	}

}
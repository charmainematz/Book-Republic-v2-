<?php 
class Genre_m extends MY_Model{

	protected $_table_name = 'genre';
	protected $_order_by = 'genre.genre_name asc';
	protected $_primary_key = 'genre.genre_id';
	protected $_primary_filter = 'intval'; //strval

	
	function __construct()
	{
		parent::__construct();
	}

	public function get_genres ()
	{
		// Fetch pages without parents
		$this->db->select('*');
		
		$types = parent::get();
		
		// Return key => value pair array
		$array = array(
			'' => 'Select Genre'
		);
		if (count($types)) {
			foreach ($types as $type) {
				$array[$type->genre_id] = $type->genre_name;
			}
		}
		
		return $array;
	}

	public function getgenre()
	{
		// Fetch pages without parents
		$this->db->select('*');
		
		return parent::get();
		
		
		
	}

}
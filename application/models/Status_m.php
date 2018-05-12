<?php 
class Status_m extends MY_Model{

	protected $_table_name = 'status';
	protected $_order_by = 'status.status_name asc';
	protected $_primary_key = 'status.status_id';
	protected $_primary_filter = 'intval'; //strval

	
	function __construct()
	{
		parent::__construct();
	}
	public function getStatus ($category)
	{
		$this->db->select('*');

		$this->db->where('category',$category);
		
		return parent::get();
		

	
	}
	public function getReservationStatus(){

		$this->db->select('*');
		$this->db->where('category', 'booking');
		return parent::get();
	}
	public function getPaymentStatus(){

		$this->db->select('*');
		$this->db->where('category', 'payment');
		return parent::get();
	}
	public function get_status ()
	{
		// Fetch pages without parents
		$this->db->select('*');
		$this->db->where('active', 1);
		$types = parent::get();
		
		// Return key => value pair array
		$array = array(
			'' => 'Select Action'
		);
		if (count($types)) {
			foreach ($types as $type) {
				$array[$type->status_id] = $type->status_name;
			}
		}
		
		return $array;
	}

	
	public function get_new(){
		$status = new stdClass();
		$status->status_name = '';
		$status->status_desc = '';
		
		return $status;
	}

}
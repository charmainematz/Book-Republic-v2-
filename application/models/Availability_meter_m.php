<?php 
class Availability_meter_m extends MY_Model{

	protected $_table_name = 'availability_meter';
	protected $_order_by = 'availability_meter.am_id asc';
	protected $_primary_key = 'availability_meter.am_id';
	protected $_primary_filter = 'intval'; //strval

	
	function __construct()
	{
		parent::__construct();
	}

	public function get_availability_meters ()
	{
		// Fetch pages without parents
		$this->db->select('*');
		
		$types = parent::get();
		
		// Return key => value pair array
		$array = array(
			'' => 'Select Action'
		);
		if (count($types)) {
			foreach ($types as $type) {
				$array[$type->availability_meter_id] = $type->availability_meter_name;
			}
		}
		
		return $array;
	}

	
}
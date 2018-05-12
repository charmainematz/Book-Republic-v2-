<?php 
class Access_log_m extends MY_Model{

	protected $_table_name = 'access_logs';
	protected $_order_by = 'access_logs.access_log_id desc';
	protected $_primary_key = 'access_logs.log_id';
	protected $_primary_filter = 'intval'; //strval

	
	function __construct()
	{
		parent::__construct();
	}

	public function add_log($message, $user_id){
		

		$data = array(
                'message' => $message,
                'user_id' =>  $user_id,  
               
                'date_created' =>  date("Y-m-d H:i:s"),
        );
          $this->db->insert('access_logs',$data);


	}
	public function get_logs($user_id){
		

		$this->db->select('*');
	    $this->db->where('user_id',$user_id);
	  	return parent::get();

	}




}
<?php 
class Account_log_m extends MY_Model{

	protected $_table_name = 'account_logs';
	protected $_order_by = 'account_logs.date_created desc';
	protected $_primary_key = 'account_logs.log_id';
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
          $this->db->insert('account_logs',$data);


	}
	public function get_logs($user_id){
		

		$this->db->select('*');
	    $this->db->where('user_id',$user_id);
	  	return parent::get();

	}




}
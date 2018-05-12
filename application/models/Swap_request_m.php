<?php 
class Swap_request_m extends MY_Model{

	protected $_table_name = 'swap_request';
	protected $_order_by = 'swap_request.swap_request_id asc';
	protected $_primary_key = 'swap_request.swap_request_id';
	protected $_primary_filter = 'intval'; //strval


	function __construct()
	{
		parent::__construct();
	}
	public function get_my_swap_request($receiver_id)
	{
		$this->db->select('*');
	    $this->db->where('receiver_id',$receiver_id);
	     $this->db->where('status',0);



	  	return parent::get();	   
	}

	public function get_swap_request1($sender_id, $receiver_id)
	{
		$this->db->select('*');
	    $this->db->where('sender_id',$sender_id);
	    $this->db->where('receiver_id',$receiver_id);



	  	return parent::get();	   
	}
	public function get_swap_request2($sender_id, $receiver_id)
	{
		$this->db->select('*');
	    $this->db->where('sender_id',$receiver_id);
	    $this->db->where('receiver_id',$sender_id);



	  	return parent::get();	   
	}
	
	public function get_friend_id($name){

		$this->db->select('*');
	    $this->db->where('friend_name',$name);
	  	return parent::get();
	}
	public function getNotification($receiver_id){

        $this->db->select('*');
        $this->db->where('notif', 1);
        $this->db->where('receiver_id',$receiver_id);
	    $this->db->where('status',0);
        return parent::get();
        
    }
}
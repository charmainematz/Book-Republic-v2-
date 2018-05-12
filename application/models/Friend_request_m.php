<?php 
class Friend_request_m extends MY_Model{

	protected $_table_name = 'friend_request';
	protected $_order_by = 'friend_request.friend_request_id asc';
	protected $_primary_key = 'friend_request.friend_request_id';
	protected $_primary_filter = 'intval'; //strval


	function __construct()
	{
		parent::__construct();
	}
	public function get_my_friend_request($receiver_id)
	{
		$this->db->select('*');
	    $this->db->where('receiver_id',$receiver_id);
	     $this->db->where('status',0);



	  	return parent::get();	   
	}

	public function get_friend_request1($sender_id, $receiver_id)
	{
		$this->db->select('*');
	    $this->db->where('sender_id',$sender_id);
	    $this->db->where('receiver_id',$receiver_id);



	  	return parent::get();	   
	}
	public function get_friend_request2($sender_id, $receiver_id)
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
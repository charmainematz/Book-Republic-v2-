<?php 
class Borrow_request_m extends MY_Model{

	protected $_table_name = 'borrow_request';
	protected $_order_by = 'borrow_request.borrow_request_id asc';
	protected $_primary_key = 'borrow_request.borrow_request_id';
	protected $_primary_filter = 'intval'; //strval


	function __construct()
	{
		parent::__construct();
	}
	public function get_my_borrow_request($receiver_id)
	{
		$this->db->select('*');
	    $this->db->where('receiver_id',$receiver_id);
	     $this->db->where('request_status',0);



	  	return parent::get();	   
	}
	
	public function get_borrow_request1($sender_id, $receiver_id)
	{
		$this->db->select('*');
	    $this->db->where('sender_id',$sender_id);
	    $this->db->where('receiver_id',$receiver_id);



	  	return parent::get();	   
	}
	public function get_borrow_request2($sender_id, $receiver_id)
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
	    $this->db->where('request_status',0);
        return parent::get();
        
    }

    public function isValid($book_id, $user_id){

    	$this->db->select('*');
        $this->db->where('book_id', $book_id);
        $this->db->where('sender_id',$user_id);
	   
        $result= parent::get();

        if(count($result)>=1)
        {
        	return 0;
        }
        else{
        	return 1;
        }

    }


}












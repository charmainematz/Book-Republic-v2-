<?php 
class Friend_m extends MY_Model{

	protected $_table_name = 'friendships';
	protected $_order_by = 'friendships.friendship_id asc';
	protected $_primary_key = 'friendships.friendship_id';
	protected $_primary_filter = 'intval'; //strval


	function __construct()
	{
		parent::__construct();
	}
	
	public function getFriends($id)
	{
		$friends=array();

		$users = $this->user_m->get();

		foreach($users as $user){
			if($id<$user->id){
				if($this->friend_m->isFriendsMin($id,$user->id)==1){
					array_push($friends,$user->id);
				}

			}
			else if($id>$user->id){
				if($this->friend_m->isFriendsMax($id,$user->id)==1){
					array_push($friends,$user->id);
				}
			}

		}
		
		return $friends;
	}

	public function isFriendsMin($logged_in, $look_up){

		$this->db->select('*');
	    $this->db->where('user1_id',$logged_in);
	    $this->db->where('user2_id',$look_up);
	    $result = parent::get();

	    if(count($result)==1){
	    	return 1;
	    }
	    else{
	    	0;
	    }
	}
	public function isFriendsMax($logged_in, $look_up){

		$this->db->select('*');
	    $this->db->where('user1_id',$look_up);
	    $this->db->where('user2_id',$logged_in);
	    $result = parent::get();

	    if(count($result)==1){
	    	return 1;
	    }
	    else{
	    	0;
	    }
	}
	public function author_exists($name)
	{
		$this->db->select('*');
	    $this->db->where('author_name',$name);
	  	return parent::get();	   
	}
	
	public function get_author_id($name){

		$this->db->select('*');
	    $this->db->where('author_name',$name);
	  	return parent::get();
	}
}
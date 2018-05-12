<?php 

class Friend extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Friend';
		$this->data['page_desc'] = '';

		$this->data['c'] = '';
		$this->data['m'] = '';
		$this->load->model('inquiry_m');
		$this->load->model('status_m');
	}

	public function add_friend($sender_id, $receiver_id){

		$data = array(
               
                'sender_id' =>     $sender_id,  
                'receiver_id' =>   $receiver_id,      
                'status' =>        0,              
                'date_sent' =>   date('Y-m-d'),

                
        );
        $this->db->insert('friend_request',$data);

        $user = $this->user_m->get($receiver_id);
        $this->account_log_m->add_log('You sent a friend request to '.$user->first_name." ".$user->last_name.".", $sender_id);
		redirect('user/profile/'.$receiver_id);
	}
	public function accept($request_id){
		$data = array(
               
               
                'status' =>        1,              
                'date_approved' =>   date('Y-m-d'),

                
        );
         $this->db->update('friend_request',$data, array('friend_request_id'=>$request_id));


         $friendship = $this->friend_request_m->get($request_id);
         if($friendship->sender_id<$friendship->receiver_id){

         	$min=$friendship->sender_id;
         	$max = $friendship->receiver_id;
         }
         else{
         	$max=$friendship->sender_id;
         	$min = $friendship->receiver_id;
         }

         $data2 = array(
               
                'user1_id' =>     $min,  
                'user2_id' =>   $max,      
                'status' =>        1,              
                'date_created' =>   date('Y-m-d'),              
        );
         $this->db->insert('friendships',$data2);

         $sender = $this->user_m->get($friendship->sender_id);
         $this->account_log_m->add_log('You approved '.$sender->first_name." ".$sender->last_name."'s friend request", $friendship->receiver_id);

          redirect('dashboard');
	}
   
}
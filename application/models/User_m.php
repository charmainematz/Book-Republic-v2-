<?php 
class User_m extends MY_Model{


	protected $_table_name = 'users';
	protected $_order_by = 'users.id asc';
	protected $_primary_key = 'users.id ';
	protected $_primary_filter = 'intval'; //strval
    

    function __construct() {
       parent::__construct();
    }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select('id');
           
            $this->db->where(array('oauth_provider'=>$userData['oauth_provider'],'oauth_uid'=>$userData['oauth_uid']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();
            
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();
                
                //update user data
                $userData['modified'] = date("Y-m-d H:i:s");
                $update = $this->db->update('users',$userData,array('id'=>$prevResult['id']));
                
                //get user ID
                $userID = $prevResult['id'];
            }else{
                //insert user data
                $userData['created']  = date("Y-m-d H:i:s");
                $userData['modified'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert('users',$userData);
                
                //get user ID
                $userID = $this->db->insert_id();
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }

    public function isUser($id){
        
        $this->db->where('user_id',$id);
        $this->db->select('*');
        $this->db->from('users_groups');
        $usergroup = parent::get();

       
         if($usergroup[0]->group_id==2){
            return 1;
         }
         else
         {
            return 0;
         }
    }
}
<?php 

class User extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->data['page_title'] = 'User';
        $this->data['page_desc'] = 'Admin Panel';
        $this->data['c'] = 'User';
        $this->data['m'] = '';
        
        
        
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
    }
    public function index(){
        
        $this->data['users'] = $this->user_m->get();      
        $this->data['subview'] = 'user/index';
        $this->load->view('layouts/_layout_main',$this->data);
    }

    public function profile($id){

        $friends = array();
        $this->data['bookworm']=$this->user_m->get($id);
        if($this->session->userdata('user_id')==$id){

        $this->data['page_title'] = 'Profile';
    
        }

       $friends= $this->friend_m->getFriends($id);
       print_r($friends);
         $this->data['friends']=$friends;
        $this->data['subview'] = 'dashboard/profile';
        $this->load->view('layouts/_layout_main',$this->data);


    }
    public function register()
    {

      
        $this->data['m'] = "Register";
     
        
        
        $this->form_validation->set_rules('email','Email','trim|valid_email|required');
        $this->form_validation->set_rules('password','Password','trim|min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('password_confirm','Confirm password','trim|matches[password]|required');
 
        if($this->form_validation->run()===FALSE)
        {
            
         
            $this->data['page_desc'] = 'Create Admin';
            $this->data['m'] = 'Users ';
            $this->data['c'] = 'Users'; 
            $this->data['subview'] = 'user/register';
            $this->load->view('layouts/_layout_main', $this->data);
        }
        else
        {
           
            $email = $this->input->post('email');
      
            $password = $this->input->post('password');
 
            $additional_data = array(
                'username'  => $this->input->post('username'),
                'first_name'  => $this->input->post('first_name'),
                'last_name'    =>$this->input->post('last_name'),
                'phone'    =>$this->input->post('phone')
                
            );
 
           

            if($this->ion_auth->register($email,$password,$email,$additional_data))
            {
                $_SESSION['auth_message'] = 'The account has been created. You may now login.';
               
                redirect('user');
            }
            else
            {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect('user');
            }
        }
    }
        public function deactivate($id)
    {
       
         $data = array(
               
                'active' => 0,
               
            );
         $this->db->update('users', $data, array('id' => $id));
       redirect('user');
      
    }
   public function activate($id)
    {
       
         $data = array(
               
                'active' => 1,
               
            );
        $this->db->update('users', $data, array('id' => $id));
       redirect('user');
    }
    
}





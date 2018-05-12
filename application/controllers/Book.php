<?php 

class Book extends Admin_Controller{

	public function __construct(){
		parent::__construct();
        $this->data['page_title'] = 'Book';
		$this->data['c'] = 'Books';
		$this->data['m'] = '';
		$this->data['page_desc'] = 'Bookings';
		
	
		
	}

	public function index(){
		$this->data['page_title'] = 'Books';
		$this->data['m'] = 'List of Books';
		$this->data['books'] = $this->book_m->get_Books();
		$this->data['book_conditions'] = $this->book_condition_m-> get_book_conditions();
		$this->data['genres'] = $this->genre_m->get_genres();
		$this->data['subview'] = 'book/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}
	public function bookshelf($id){

		$this->data['user']= $this->user_m->get($id);
         if($this->session->userdata('user_id')==$id){

            $this->data['page_title'] = 'Bookshelf';
    
        }
		
		$this->data['book_conditions'] = $this->book_condition_m->get_book_conditions();
		$this->data['genres'] = $this->genre_m->get_genres();		
		$this->data['books'] = $this->book_m->get_Bookshelf($id);
		$this->data['subview'] = 'book/bookshelf';
		$this->load->view('layouts/_layout_main',$this->data);
	}

	    public function ajax_update()
    {
    	$user_id = $this->session->userdata('user_id');
	
      
        
       

		$data = array(
                'author_id' => $author_id,
                'title' =>     $this->input->post('title'),  
                'genre_id' =>     $this->input->post('genre_id'),    
                'book_condition_id' =>     $this->input->post('book_condition_id'),  
                'synopsis' =>     $this->input->post('synopsis'),  
                'owner_id' =>   $user_id,
        );
      
       if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             $data['cover_photo']  =  $upload;
             
           
        }
          $insert = $this->db->update('books',$data, array('book_id'=>$this->input->post('id')));
         
 
        echo json_encode(array("status" => TRUE));
    }
 
	 public function ajax_edit($id)
    {

        $data = $this->book_m->get_Book($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data[0]);
    }

   public function getRandomCode(){
    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $su = strlen($an) - 1;
    return substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1);
    }
	 private function _do_upload()
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = $this->getRandomCode()."_".date('Y-m-d')."_".$this->session->userdata('user_id').".jpg"; //just milisecond timestamp fot unique name
     
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
	
	

	public function add(){

		$user_id = $this->session->userdata('user_id');
		$data = array(
                'author_name' => $this->input->post('author'),              
            );
      
       if(count($this->author_m->author_exists($this->input->post('author')))<1){
	       	$this->db->insert('authors',$data);
	       $author_id= $this->db->insert_id();

       }
       else{
           $author_id= $this->author_m->get_author_id($this->input->post('author'))[0]->author_id;
       }
    

		$data2 = array(
                'author_id' => $author_id,
                'title' =>     $this->input->post('title'),  
                'genre_id' =>     $this->input->post('genre_id'),    
                'book_condition_id' =>     $this->input->post('book_condition_id'),  
                'synopsis' =>     $this->input->post('synopsis'),  
                'owner_id' =>   $user_id,
                'date_added' =>   date('Y-m-d'),
        );
      
       if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             $data2['cover_photo']  =  $upload;
             
           
        }
                 
                  
        $insert = $this->db->insert('books',$data2);
          $this->account_log_m->add_log('You added a book entitled '. $this->input->post('title').'.', $user_id);
            
		redirect('book/bookshelf/'.$this->session->userdata('user_id'));
		
	}
    public function update(){

        $user_id = $this->session->userdata('user_id');
        $data = array(
                'author_name' => $this->input->post('author'),              
            );
      
       if(count($this->author_m->author_exists($this->input->post('author')))<1){
            $this->db->insert('authors',$data);
           $author_id= $this->db->insert_id();

       }
       else{
           $author_id= $this->author_m->get_author_id($this->input->post('author'))[0]->author_id;
       }
    

        $data2 = array(
                'author_id' => $author_id,
                'title' =>     $this->input->post('title'),  
                'genre_id' =>     $this->input->post('genre_id'),    
                'book_condition_id' =>     $this->input->post('book_condition_id'),  
                'synopsis' =>     $this->input->post('synopsis'),  
                'owner_id' =>   $user_id,
                'date_added' =>   date('Y-m-d'),
        );
      
    
                  
       $this->db->update('books',$data2, array('book_id'=>$this->input->post('book_id')));
            
        redirect('book/bookshelf/'.$this->session->userdata('user_id'));
        
    }
    public function ajax_delete($id)
    {
        $this->book_m->delete($id);
        echo json_encode(array("status" => TRUE));
    }

    public function borrow(){



        $sender_id =$this->session->userdata('user_id');
        $receiver_id = $this->input->post('owner_id'); 
        $book_id = $this->input->post('book_id');

        $data = array(
               
                'sender_id' =>     $sender_id,
                'receiver_id' =>   $receiver_id,      
                'request_status' =>        0,              
                'date_sent' =>   date('Y-m-d'),
                'book_id'  =>  $book_id,               
        );
        $book = $this->book_m->get($book_id);
        $user = $this->user_m->get($receiver_id);

        if($book->status=='Available'){
              if($this->borrow_request_m->isValid($book_id,$sender_id)==1){

                 
                    $this->account_log_m->add_log('You requested '.$user->first_name." to borrow ".$book->title, $sender_id);

                    $this->session->set_flashdata('message', 'You requested to borrow '.$user->first_name."'s' ".$book->title);     
                    $this->db->insert('borrow_request',$data);
                }
                else{
                      $this->session->set_flashdata('message2', 'Your borrow request for this book already exists.');     
                }

        }else{

            $this->session->set_flashdata('message2', 'Sorry, '.$book->title." is unavailable for borrowing.");    
        }
              
        redirect('dashboard');
    }
    public function accept_borrow_request($request_id){
        $data = array(             
                'request_status' =>        1,              
                'date_approved' =>   date('Y-m-d'),

                
        );
         $this->db->update('borrow_request',$data, array('borrow_request_id'=>$request_id));


         $borrow = $this->borrow_request_m->get($request_id);

          $data1 = array(             
                'status' =>        'Borrowed',              
                
                
        );
         $this->db->update('books',$data1, array('book_id'=>$borrow->book_id));
         

         $data2 = array(
               
                'book_id' =>     $borrow->book_id,  
                'borrower_id' =>   $borrow->sender_id,      
                'owner_id' =>        $borrow->receiver_id,  
                           
                'date_created' =>   date('Y-m-d'),              
        );
         $this->db->insert('book_borrows',$data2);

         $sender = $this->user_m->get($borrow->sender_id);
         $this->account_log_m->add_log('You approved '.$sender->first_name." ".$sender->last_name."'s book request", $borrow->receiver_id);

        $this->session->set_flashdata('message', 'You approved '.$sender->first_name." ".$sender->last_name."'s book request.");
          redirect('dashboard');
    }

}
<?php 

class Status extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Status';
		$this->data['c'] = 'status';
		$this->data['m'] = '';
		$this->data['page_desc'] = 'List of Status';
		$this->load->model('status_m');
		
		
	}

	public function index(){
		
		$this->data['status1'] = $this->status_m->getStatus('room');	
        $this->data['status2'] = $this->status_m->getStatus('booking');    
        $this->data['status3'] = $this->status_m->getStatus('payment');    
        $this->data['status4'] = $this->status_m->getStatus('mail');    	
		$this->data['subview'] = 'status/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}


	public function ajax_add()
    {

        if($this->input->post('category')==1){
            $category = 'room';
            
        }else if($this->input->post('category')==2){
            $category = 'booking';
            
        }else if($this->input->post('category')==3){
            $category = 'payment';
            
        }else if($this->input->post('category')==4){
            $category = 'mail';
            
        }
        $this->_validate('create');
        $data = array(
                'status_name' => $this->input->post('status_name'),
                'status_desc' => $this->input->post('status_desc'),
                'category' => $category,
               
            );
        $data['created_by'] = $this->session->userdata('user_id');
        $data['date_created'] = date('Y-m-d');
        $insert = $this->db->insert('status',$data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {
        $data = $this->status_m->get($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->_validate('update');
        $data = array(
                'status_name' => $this->input->post('status_name'),
                'status_desc' => $this->input->post('status_desc'),
               
            );
        $this->status_m->save($data,$this->input->post('id'));
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->status_m->delete($id);
        echo json_encode(array("status" => TRUE));
    }
	
	 private function _validate($method)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
      
        if($this->input->post('status_name') == '')
        {
            $data['inputerror'][] = 'status_name';
            $data['error_string'][] = 'status Name is required';
            $data['status'] = FALSE;
        }else{
            if ($method == 'create') {
                $this->db->where('status_name',$this->input->post('status_name'));
                $x = count($this->status_m->get());
                if($x >= 1){
                    $data['inputerror'][] = 'status_name';
                    $data['error_string'][] = 'Status Name  already Exists';
                    $data['status'] = FALSE;
                }
            }
        }

         if($this->input->post('status_desc') == '')
        {
            $data['inputerror'][] = 'status_desc';
            $data['error_string'][] = 'Description is required';
            $data['status'] = FALSE;
        }
 
        
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }



}
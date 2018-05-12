<?php 

class Mail extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Mailbox';
		$this->data['page_desc'] = 'Inquiries';

		$this->data['c'] = 'service';
		$this->data['m'] = '';
		$this->load->model('inquiry_m');
		$this->load->model('status_m');
	}

	public function index(){
		$this->data['statuses'] = $this->status_m->getStatus('mail');   
		$this->data['inquiries'] = $this->inquiry_m->get();		
		$this->data['subview'] = 'mail/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}
   public function updateStat(){
   	 	$name= 'status_'.$this->input->post('inquiry_id');
   	 	$data = array(
               
                'status' => $this->input->post($name),
               
            );
        $this->db->update('inquiries', $data, array('inquiry_id' => $this->input->post('inquiry_id')));
        redirect('mail');
      
   }
	 public function clearNotif($res_id){
          $data3 = array(
            'notif' =>0,
      );

         

        $this->db->update('inquiries', $data3, array('inquiry_id' => $res_id));  
        redirect('mail');
    }

}
<?php 

class Costumization extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Hotel Profile';
		$this->data['c'] = 'costumization';
		$this->data['m'] = '';
		$this->data['page_desc'] = 'Website Builder and Editor';
        $this->load->model('costumization_m');
		
		
	}

	public function index(){
		$this->data['costumization'] = $this->costumization_m->get(1);
	
		$this->data['subview'] = 'costumization/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}
    

    public function update()
    {
       
        $data = array(
               
                'hotel_name' => $this->input->post('hotel_name'),
                 'sub_name' => $this->input->post('sub_name'),
                'email' => $this->input->post('email'),
                'about' => $this->input->post('about'),
                  'map' => $this->input->post('map'),
                'address' => $this->input->post('address'),
                'telephone' => $this->input->post('telephone'),
                 'facebook' => $this->input->post('facebook'),
                'twitter' => $this->input->post('twitter'),
                'instagram' => $this->input->post('instagram'),
               
               
            );
      $this->db->update('hotel', $data, array('hotel_id' => $this->input->post('costumization_id')));  
        redirect('costumization');
    }
 
    



}
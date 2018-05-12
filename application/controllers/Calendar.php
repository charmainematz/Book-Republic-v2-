<?php 

class Calendar extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Calendar';
		$this->data['c'] = 'calendar';
		$this->data['m'] = '';
		$this->data['page_desc'] = 'Calendar';
		$this->load->model('availability_meter_m');
        $this->load->model('null_date_m');
		$this->load->model('event_m');
        $this->load->model('event_type_m');
         $this->load->model('services_availed_m');
        $this->load->model('status_m');
        $this->load->model('client_m');
		
	}

	public function index2(){
		
		   $this->data['events'] = $this->event_m->getEvents();
		$this->data['subview'] = 'calendar/index';
		$this->load->view('layouts/_layout_main',$this->data);
	}
    public function index(){
        $this->data['ams'] = $this->availability_meter_m->get();     
        $this->data['null_dates'] = $this->null_date_m->getNullDates();      
        $this->data['subview'] = 'calendar/slot';
        $this->load->view('layouts/_layout_main',$this->data);
    }
    public function changeAvailability(){
       
            if($this->null_date_m->changeAllowed(
                $this->null_date_m->get($this->input->post('null_date_id'))->event_date,
                $this->input->post('am_id'))
            ){
                $data2 = array(             
                    'availability_meter' => $this->input->post('am_id'),             
                 );
                //change limit
                $this->db->update('null_dates', $data2, array('null_date_id' =>$this->input->post('null_date_id') ));
                
                //Active || Inactive
                $this->null_date_m->updateNullDate( $this->null_date_m->get($this->input->post('null_date_id'))->event_date);
                 
            }

            redirect('calendar');
           
    }


    public function get_unavailable()
    {
        
        $unavailable = $this->null_date_m->getUnavailable();
        echo json_encode(array($unavailable));
    }

	public function ajax_add()
    {
        
        $data = array(
                'am_description' => $this->input->post('am_desc'),
                'set_limit' => $this->input->post('set_limit'),
               
            );
        
        $insert = $this->db->insert('availability_meter',$data);
        echo json_encode(array("availability_meter" => TRUE));
    }

    public function ajax_edit($id)
    {
        $data = $this->availability_meter_m->get($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->_validate('update');
        $data = array(
                'am_description' => $this->input->post('am_desc'),
                'am_color' => $this->input->post('am_color'),
                'set_limit' => $this->input->post('set_limit'),
               
            );
        $this->availability_meter_m->save($data,$this->input->post('id'));
        echo json_encode(array("availability_meter" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->availability_meter_m->delete($id);
        echo json_encode(array("availability_meter" => TRUE));
    }
	
	



}
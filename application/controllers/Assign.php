<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assign extends CI_Controller{

	public function index() {
		$this->load->model('Assign_model');
        $assigned = $this->Assign_model->all();
        $data = array();
        $data['assigned'] = $assigned;
        $this->load->view('admin/assign/list',$data);
	}
	public function create() {

		$this->load->model('Assign_model');
        $assignid = $this->Assign_model->assign_id();
        $getEmployee = $this->Assign_model->getEmployee();
        $getTask = $this->Assign_model->getTask();

        $this->form_validation->set_rules('task_id','Task Name','required');
		$this->form_validation->set_rules('emp_id','Employee Name','required');
		
		if ($this->form_validation->run() == false) {
	
			$last_id=$assignid->taskId;
			
			if(empty($last_id)){

    $taskId = "TAS-20-21-001";
}
else {

    $idd = str_replace("TAS-20-21-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $taskId = 'TAS-20-21-'.$id;
}


            $this->load->view('admin/assign/create', ['getEmployee'=>$getEmployee, 'getTask'=>$getTask,'taskId'=>$taskId]);
        } else {
			//save record to database
			$formArray = array();
			$formArray ['task_id'] = $this->input->post ('task_id');
			$formArray ['emp_id'] = $this->input->post ('emp_id');
			$this->Assign_model->create($formArray);
			$this->session->set_flashdata('success','Task created successfully!');
			redirect(base_url().'index.php/assign/index');
			// $values = $this->input->post('emp_id');
			// print_r($values);
			// echo $values;
			// foreach ($values as $a){
				// 	$formArray = array();
				// 	$formArray ['task_id'] = $this->input->post ('task_id');
			// 			$formArray ['emp_id'] = $a;
			// $this->Assign_model->create($formArray);
			// }
		  }    
		}
		
	
		public function gm_index() {
		$this->load->model('Assign_model');
        $assigned = $this->Assign_model->all();
        $data = array();
        $data['assigned'] = $assigned;
        $this->load->view('gm/assign/list',$data);
	}
	public function gm_create() {

		$this->load->model('Assign_model');
        $getEmployee = $this->Assign_model->getEmployee();
        $getTask = $this->Assign_model->getTask();
		
        $this->form_validation->set_rules('task_id','Task Name','required');
		$this->form_validation->set_rules('emp_id','Employee Name','required');
		
		if ($this->form_validation->run() == false) {
			$assignid = $this->Assign_model->assign_id();
			$last_id=$assignid->taskId;
			
			if(empty($last_id)){

				$taskId = "TAS-20-21-001";
			}
else {
	
    $idd = str_replace("TAS-20-21-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $taskId = 'TAS-20-21-'.$id;
}
$this->load->view('gm/assign/create', ['getEmployee'=>$getEmployee, 'getTask'=>$getTask,'taskId'=>$taskId]);
        } else {
			//save record to database
			$formArray = array();
			$formArray ['task_id'] = $this->input->post ('task_id');
			$formArray ['emp_id'] = $this->input->post ('emp_id');
			$this->Assign_model->create($formArray);
			$this->session->set_flashdata('success','Task created successfully!');
			redirect(base_url().'index.php/assign/gm_index');
			// $values = $this->input->post('emp_id');
			// print_r($values);
			// echo $values;
			// foreach ($values as $a){
			// 	$formArray = array();
			// 	$formArray ['task_id'] = $this->input->post ('task_id');
			// 			$formArray ['emp_id'] = $a;
						// $this->Assign_model->create($formArray);
			// }
		  }    
	}
}
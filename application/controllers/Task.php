<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Task extends CI_Controller{
	
	public function index(){
		
		$this->load->model('Task_model');
		$data = array();
		if (isset($_COOKIE['empId'])) {
			if ($_COOKIE['empRole'] == 'General Manager') {
				$tasks = $this->Task_model->all();
				$projectsall = $this->Task_model->getallproject();
				$allemployee = $this->Task_model->getallemployee();
				$data['totalemployee']=$allemployee;
				$data['totalproject']=$projectsall;
				$data['tasks'] = $tasks;
				$this->load->view('admin/task/list',$data);
			}else if($_COOKIE['empRole'] == 'HR Manager'){
				
				$tasks = $this->Task_model->all();
				$projectsall = $this->Task_model->getallproject();
				$allemployee = $this->Task_model->getallemployee();
				$data['totalemployee']=$allemployee;
				$data['totalproject']=$projectsall;
				$data['tasks'] = $tasks;
				$this->load->view('hm/task/list',$data);
			}else if($_COOKIE['empRole'] == 'Project Manager'){
				
				$tasks = $this->Task_model->all();
				$projectsall = $this->Task_model->getallproject();
				$allemployee = $this->Task_model->getallemployee();
				$data['totalemployee']=$allemployee;
				$data['totalproject']=$projectsall;
				$data['tasks'] = $tasks;
				$this->load->view('pm/task/list',$data);
			}

			else {
				$prodetail=array();
				
				$projectsall = $this->Task_model->getallproject();
				$allemployee = $this->Task_model->getallemployee();
				
				$taskall = $this->Task_model->getalltask();
				foreach ($taskall as  $value) {
					$x=explode(",",$value['taskMem']);
					if(in_array($_COOKIE['empId'],$x)){
						
						$projectdetail = $this->Task_model->getProjectByUser($value['taskId']);
						array_push($prodetail,$projectdetail);
					}
				}
				
				
				
				$data['tasks'] = $prodetail;
				$data['totalemployee']=$allemployee;
				$data['totalproject']=$projectsall;
	
				$this->load->view('emp/task/list',$data);
			}
		}
	}
	
	public function gm_index(){

		$this->load->model('Task_model');
		$data = array();
		if (isset($_COOKIE['empId'])) {
			if ($_COOKIE['empRole'] == 'General Manager') {
				$tasks = $this->Task_model->all();
				$data['tasks'] = $tasks;
				$this->load->view('gm/task/list',$data);
			} else {
				$tasks = $this->Task_model->getTaskByUser($_COOKIE['empId']);
				$data['tasks'] = $tasks;
				$this->load->view('emp/task/list',$data);
			}
			
		}
	}

	public function create(){
		$this->load->model('Task_model');
        $getEmployee = $this->Task_model->getEmployee();
        $getProject = $this->Task_model->getProject();
        $assign_id = $this->Task_model->assign_id();
		
		$this->form_validation->set_rules('taskId','Task ID');
		$this->form_validation->set_rules('taskTitle','Task Title','required');
		$this->form_validation->set_rules('projectName','Project Name','required');
		$this->form_validation->set_rules('taskDesc','Description','required');
		$this->form_validation->set_rules('taskSdate','Start Date','required');
		$this->form_validation->set_rules('taskEdate','Due Date','required');
		$this->form_validation->set_rules('taskStatus','Task Status','required');
		$this->form_validation->set_rules('taskMem[]','Assigned To','required');
		$this->form_validation->set_rules('priority','Priority','required');
		
		if ($this->form_validation->run() == false) {
			if($assign_id != []){

				$last_id=$assign_id->taskId;
			}else{
				$last_id="";
			}
			
if(empty($last_id)){

    $taskId = "TAS-20-21-001";
}
else {

    $idd = str_replace("TAS-20-21-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $taskId = 'TAS-20-21-'.$id;
}

			$this->load->view('admin/task/create', ['getEmployee'=>$getEmployee, 'getProject'=>$getProject,'taskId' => $taskId]);
        } else {
			//save record to database
			$formArray = array();
			$formArray ['taskId'] = $this->input->post ('taskId');
			$formArray ['taskTitle'] = $this->input->post ('taskTitle');
			$formArray ['projectName'] = $this->input->post ('projectName');
			$formArray ['taskDesc'] = $this->input->post ('taskDesc');
			$formArray ['taskSdate'] = $this->input->post ('taskSdate');
			$formArray ['taskEdate'] = $this->input->post ('taskEdate');
			$formArray ['taskStatus'] = $this->input->post ('taskStatus');
			$propmem = $this->input->post ('taskMem[]');
			$r=array();
			foreach($propmem as $y ){
				array_push($r,"Pending");
			}
			$za=implode(",",$r);
			$propmemnew=implode(",",$propmem);
			$formArray ['taskMem'] = $propmemnew;
			$formArray ['taskMemStatus'] = $za;
			$formArray ['priority'] = $this->input->post ('priority');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
			$data['assign_to'] = $this->input->post('taskMem');
			$data['assign_from'] = $this->session->userdata('empId');
			$this->Task_model->create($formArray);
			$this->session->set_flashdata('success','Task created successfully!');
			redirect(base_url().'index.php/task/index');
		}    
	}



	public function pm_create(){
		$this->load->model('Task_model');
        $getEmployee = $this->Task_model->getEmployee();
        $getProject = $this->Task_model->getProject();
		
		$this->form_validation->set_rules('taskId','Task ID');
		$this->form_validation->set_rules('taskTitle','Task Title','required');
		$this->form_validation->set_rules('projectName','Project Name','required');
		$this->form_validation->set_rules('taskDesc','Description','required');
		$this->form_validation->set_rules('taskSdate','Start Date','required');
		$this->form_validation->set_rules('taskEdate','Due Date','required');
		$this->form_validation->set_rules('taskStatus','Task Status','required');
		$this->form_validation->set_rules('taskMem[]','Assigned To','required');
		$this->form_validation->set_rules('priority','Priority','required');
		
		if ($this->form_validation->run() == false) {

			$assign_id = $this->Task_model->assign_id();
			if($assign_id != []){
                
				$last_id=$assign_id->taskId;
			}else{
				$last_id="";
			}
			
if(empty($last_id)){

    $taskId = "TAS-20-21-001";
}
else {

    $idd = str_replace("TAS-20-21-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $taskId = 'TAS-20-21-'.$id;
}
			$this->load->view('pm/task/create', ['getEmployee'=>$getEmployee, 'getProject'=>$getProject,'taskId'=>$taskId]);
        } else {
			//save record to database
			$formArray = array();
			$formArray ['taskId'] = $this->input->post ('taskId');
			$formArray ['taskTitle'] = $this->input->post ('taskTitle');
			$formArray ['projectName'] = $this->input->post ('projectName');
			$formArray ['taskDesc'] = $this->input->post ('taskDesc');
			$formArray ['taskSdate'] = $this->input->post ('taskSdate');
			$formArray ['taskEdate'] = $this->input->post ('taskEdate');
			$formArray ['taskStatus'] = $this->input->post ('taskStatus');
			$propmem = $this->input->post ('taskMem[]');
			$r=array();
			foreach($propmem as $y ){
				array_push($r,"Pending");
			}
			$za=implode(",",$r);
			$propmemnew=implode(",",$propmem);
			$formArray ['taskMem'] = $propmemnew;
			$formArray ['taskMemStatus'] = $za;
			$formArray ['priority'] = $this->input->post ('priority');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
			$data['assign_to'] = $this->input->post('taskMem');
			$data['assign_from'] = $this->session->userdata('empId');
			$this->Task_model->create($formArray);
			$this->session->set_flashdata('success','Task created successfully!');
			redirect(base_url().'index.php/task/index');
		}    
	}

	public function gm_create(){
		$this->load->model('Task_model');
        $getEmployee = $this->Task_model->getEmployee();
        $getProject = $this->Task_model->getProject();
		
		$this->form_validation->set_rules('taskId','Task ID');
		$this->form_validation->set_rules('taskTitle','Task Title','required');
		$this->form_validation->set_rules('projectName','Project Name','required');
		$this->form_validation->set_rules('taskDesc','Description','required');
		$this->form_validation->set_rules('taskSdate','Start Date','required');
		$this->form_validation->set_rules('taskEdate','Due Date','required');
		$this->form_validation->set_rules('taskStatus','Task Status','required');
		$this->form_validation->set_rules('taskMem[]','Assigned To','required');
		$this->form_validation->set_rules('priority','Priority','required');
		
		if ($this->form_validation->run() == false) {
			$assign_id = $this->Task_model->assign_id();
			$last_id=$assign_id->taskId;
			
if(empty($last_id)){

    $taskId = "TAS-20-21-001";
}
else {

    $idd = str_replace("TAS-20-21-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $taskId = 'TAS-20-21-'.$id;
}
			$this->load->view('gm/task/create', ['getEmployee'=>$getEmployee, 'getProject'=>$getProject,'taskId'=>$taskId ]);
        } else {
			//save record to database
			$formArray = array();
			$formArray ['taskId'] = $this->input->post ('taskId');
			$formArray ['taskTitle'] = $this->input->post ('taskTitle');
			$formArray ['projectName'] = $this->input->post ('projectName');
			$formArray ['taskDesc'] = $this->input->post ('taskDesc');
			$formArray ['taskSdate'] = $this->input->post ('taskSdate');
			$formArray ['taskEdate'] = $this->input->post ('taskEdate');
			$formArray ['taskStatus'] = $this->input->post ('taskStatus');
			$propmem = $this->input->post ('taskMem[]');
			$propmemnew=implode(",",$propmem);
			$formArray ['taskMem'] = $propmemnew;
			$formArray ['priority'] = $this->input->post ('priority');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
			$data['assign_to'] = $this->input->post('taskMem');
			$data['assign_from'] = $this->session->userdata('empId');
			$this->Task_model->create($formArray);
			$this->session->set_flashdata('success','Task created successfully!');
			redirect(base_url().'index.php/task/gm_index');
		}    
	}
	
	public function edit($taskId){
		$this->load->model('Task_model');
        $task = $this->Task_model->getTask($taskId);
		$getProject = $this->Task_model->getProject();
		$getEmployee = $this->Task_model->getEmployee();
        $data = array();
        $data['task'] = $task;
        $data['getProject'] = $getProject;
        $data['getEmployee'] = $getEmployee;
        
		
		$this->form_validation->set_rules('taskId','Task ID');
        $this->form_validation->set_rules('taskTitle','Task Title','required');
		$this->form_validation->set_rules('projectName','Project Name','required');
		$this->form_validation->set_rules('taskDesc','Description','required');
		$this->form_validation->set_rules('taskSdate','Start Date','required');
		$this->form_validation->set_rules('taskEdate','Due Date','required');
		$this->form_validation->set_rules('taskStatus','Task Status','required');
		$this->form_validation->set_rules('taskMem[]','Assigned To','required');
		$this->form_validation->set_rules('priority','Priority','required');
		

        if ($this->form_validation->run() == false) {
			if (isset($_COOKIE['empId'])) {
				if ($_COOKIE['empRole'] == 'General Manager') {
            		$this->load->view('admin/task/edit',$data);
				} else {
					$this->load->view('emp/task/edit',$data);
				}
			}
        } else {
            // update task record
            $formArray = array();
			$formArray ['taskId'] = $taskId;
            $formArray ['taskTitle'] = $this->input->post ('taskTitle');
			$formArray ['projectName'] = $this->input->post ('projectName');
			$formArray ['taskDesc'] = $this->input->post ('taskDesc');
			$formArray ['taskSdate'] = $this->input->post ('taskSdate');
			$formArray ['taskEdate'] = $this->input->post ('taskEdate');
			$formArray ['taskStatus'] = $this->input->post ('taskStatus');
			$propmem = $this->input->post ('taskMem[]');

			$propmeme=explode(",",$task['taskMem']);
			$propemestatus=explode(",",$task['taskMemStatus']);

			$r=array();
			$kak=array();
			foreach($propmem as $y ){
				if(in_array($y,$propmeme)){
					$keyd=array_search($y,$propmeme);

					array_push($r,$y);
					array_push($kak,$propemestatus[$keyd]);



				}else{
					array_push($r,$y);
					array_push($kak,"Pending");


				}

				
			}

            
		
			
			$za=implode(",",$r);
			$propmemnew=implode(",",$kak);

			$formArray ['taskMem'] = $za;
			$formArray ['taskMemStatus'] = $propmemnew ;
			$formArray ['priority']=$this->input->post('priority');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Task_model->updateTask($taskId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/task/index');
			// echo $this->input->post('priority');
			
        }  
    }

    public function delete($taskId) {
        $this->load->model('Task_model');
        $task = $this->Task_model->getTask($taskId);
        if (empty($task)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/task/index');
        }

        $this->Task_model->deleteTask($taskId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/task/index');
    }

	public function pm_edit($taskId){
		$this->load->model('Task_model');
        $task = $this->Task_model->getTask($taskId);
		$getProject = $this->Task_model->getProject();
		$getEmployee = $this->Task_model->getEmployee();
        $data = array();
        $data['task'] = $task;
        $data['getProject'] = $getProject;
        $data['getEmployee'] = $getEmployee;
        
		
		$this->form_validation->set_rules('taskId','Task ID');
        $this->form_validation->set_rules('taskTitle','Task Title','required');
		$this->form_validation->set_rules('projectName','Project Name','required');
		$this->form_validation->set_rules('taskDesc','Description','required');
		$this->form_validation->set_rules('taskSdate','Start Date','required');
		$this->form_validation->set_rules('taskEdate','Due Date','required');
		$this->form_validation->set_rules('taskStatus','Task Status','required');
		$this->form_validation->set_rules('taskMem[]','Assigned To','required');
		$this->form_validation->set_rules('priority','Priority','required');
		

        if ($this->form_validation->run() == false) {
			if (isset($_COOKIE['empId'])) {
				if ($_COOKIE['empRole'] == 'General Manager') {
            		$this->load->view('pm/task/edit',$data);
				} else {
					$this->load->view('pm/task/edit',$data);
				}
			}
        } else {
            // update task record
            $formArray = array();
			$formArray = array();
			$formArray ['taskId'] = $taskId;
            $formArray ['taskTitle'] = $this->input->post ('taskTitle');
			$formArray ['projectName'] = $this->input->post ('projectName');
			$formArray ['taskDesc'] = $this->input->post ('taskDesc');
			$formArray ['taskSdate'] = $this->input->post ('taskSdate');
			$formArray ['taskEdate'] = $this->input->post ('taskEdate');
			$formArray ['taskStatus'] = $this->input->post ('taskStatus');
			$propmem = $this->input->post ('taskMem[]');

			$propmeme=explode(",",$task['taskMem']);
			$propemestatus=explode(",",$task['taskMemStatus']);

			$r=array();
			$kak=array();
			foreach($propmem as $y ){
				if(in_array($y,$propmeme)){
					$keyd=array_search($y,$propmeme);

					array_push($r,$y);
					array_push($kak,$propemestatus[$keyd]);



				}else{
					array_push($r,$y);
					array_push($kak,"Pending");


				}

				
			}

            
		
			
			$za=implode(",",$r);
			$propmemnew=implode(",",$kak);

			$formArray ['taskMem'] = $za;
			$formArray ['taskMemStatus'] = $propmemnew ;
			$formArray ['priority']=$this->input->post('priority');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Task_model->updateTask($taskId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/task/index');
			// echo $this->input->post('priority');
			
        }  
    }

    public function pm_delete($taskId) {
        $this->load->model('Task_model');
        $task = $this->Task_model->getTask($taskId);
        if (empty($task)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/task/index');
        }

        $this->Task_model->deleteTask($taskId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/task/index');
    }
	
	public function gm_edit($taskId){
		$this->load->model('Task_model');
        $task = $this->Task_model->getTask($taskId);
		$getProject = $this->Task_model->getProject();
		$getEmployee = $this->Task_model->getEmployee();
        $data = array();
        $data['task'] = $task;
        $data['getProject'] = $getProject;
        $data['getEmployee'] = $getEmployee;
        
		
		$this->form_validation->set_rules('taskId','Task ID');
        $this->form_validation->set_rules('taskTitle','Task Title','required');
		$this->form_validation->set_rules('projectName','Project Name','required');
		$this->form_validation->set_rules('taskDesc','Description','required');
		$this->form_validation->set_rules('taskSdate','Start Date','required');
		$this->form_validation->set_rules('taskEdate','Due Date','required');
		$this->form_validation->set_rules('taskStatus','Task Status','required');
		$this->form_validation->set_rules('taskMem[]','Assigned To','required');
		$this->form_validation->set_rules('priority','Priority','required');
		

        if ($this->form_validation->run() == false) {
			if (isset($_COOKIE['empId'])) {
				if ($_COOKIE['empRole'] == 'General Manager') {
            		$this->load->view('gm/task/edit',$data);
				} else {
					$this->load->view('emp/task/edit',$data);
				}
			}
        } else {
            // update task record
            $formArray = array();
			$formArray = array();
			$formArray ['taskId'] = $taskId;
            $formArray ['taskTitle'] = $this->input->post ('taskTitle');
			$formArray ['projectName'] = $this->input->post ('projectName');
			$formArray ['taskDesc'] = $this->input->post ('taskDesc');
			$formArray ['taskSdate'] = $this->input->post ('taskSdate');
			$formArray ['taskEdate'] = $this->input->post ('taskEdate');
			$formArray ['taskStatus'] = $this->input->post ('taskStatus');
			$propmem = $this->input->post ('taskMem[]');

			$propmeme=explode(",",$task['taskMem']);
			$propemestatus=explode(",",$task['taskMemStatus']);

			$r=array();
			$kak=array();
			foreach($propmem as $y ){
				if(in_array($y,$propmeme)){
					$keyd=array_search($y,$propmeme);

					array_push($r,$y);
					array_push($kak,$propemestatus[$keyd]);



				}else{
					array_push($r,$y);
					array_push($kak,"Pending");


				}

				
			}

            
		
			
			$za=implode(",",$r);
			$propmemnew=implode(",",$kak);

			$formArray ['taskMem'] = $za;
			$formArray ['taskMemStatus'] = $propmemnew ;
			$formArray ['priority']=$this->input->post('priority');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Task_model->updateTask($taskId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/task/gm_index');
			// echo $this->input->post('priority');
			
        }  
    }

    public function gm_delete($taskId) {
        $this->load->model('Task_model');
        $task = $this->Task_model->getTask($taskId);
        if (empty($task)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/task/gm_index');
        }

        $this->Task_model->deleteTask($taskId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/task/gm_index');
    }

    public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model('Task_model');
		$this->load->helper('url');
	}
	
	public function register(){
		$tasks = $this->Task_model->all();
		redirect(base_url().'index.php/task/index');
	}
	

	
	public function upd_date(){
		$formArray = array();
		$formArray2 = array();
		$projectid = $this->input->post('proid000');
		$propmem = $this->input->post('propmem');
	    $userid = $_COOKIE['empId'];
		
		
		$project = $this->Task_model->getTask($projectid);
		$promem=explode(",",$project['taskMem']);
		$promemStatus=explode(",",$project['taskMemStatus']);
		$propmemkey=array_search($userid,$promem);
		$promemStatus[$propmemkey]=$propmem;
		$propnewval=implode(",",$promemStatus);
		$formArray['taskMemStatus'] =$propnewval;
		
		if($propmem == "Progress"){
			
			$formArray2['task_id'] = $projectid;
			$formArray2['user_id'] = $userid;
			$formArray2['process_type'] = $propmem;
			date_default_timezone_set('Asia/Kolkata');
			$formArray2['starting_time'] = date (  'd-m-y H:i:s');
			$this->Task_model->create_time($formArray2);
			
		}else if($propmem == "Complete"){
			
			
			$formArray2['process_type'] = $propmem;
			date_default_timezone_set('Asia/Kolkata');
			$formArray2['end_time'] = date (  'd-m-y H:i:s');
			$this->Task_model->updateProject_time($projectid,$formArray2);
			
		}

		
		
		
		
		$this->Task_model->updateTask($projectid,$formArray);
		$this->session->set_flashdata('success','Record updated successfully');
		
		
		
		redirect(base_url().'index.php/task/index');
		

	}
	



	
	public function data(){
		$tasks = $this->Task_model->all_taa();
		// print_r($tasks);
	if(count($tasks)>0){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1','Sl No.');
		$sheet->setCellValue('B1','Task ID');
			$sheet->setCellValue('C1','EMPLOYEE NAME');
			$sheet->setCellValue('D1','PROJECT NAME');
			$sheet->setCellValue('E1','TASK MEMBER');
			$sheet->setCellValue('F1','TASK NAME');
			$sheet->setCellValue('G1','TASK SCOPE');
            $sheet->setCellValue('H1','TASK START DATE');
            $sheet->setCellValue('I1','TASK END DATE');
            $sheet->setCellValue('J1','STATUS');
            $sheet->setCellValue('K1','PRIORITY');
            $sheet->setCellValue('L1','Start Time');
            $sheet->setCellValue('M1','End Time');
            $sheet->setCellValue('N1','Total Hour');
            $row =2;
			$coun=0;
			foreach($tasks as $task){
				$coun++;
				$sheet->setCellValue('A'.$row,$coun);
				$sheet->setCellValue('B'.$row,$task['taskId']);
				

				$promemStatus=explode(",",$task['taskMemStatus'] );
				$promem=explode(",",$task['taskMem'] );
                $allemployee= $this->Task_model->getallemployee();
                                 $xassa=array();
                                foreach ($promem as $key=>$value) {
                                    foreach($allemployee as $key2=>$emp){
                                        if($promem[$key] == $emp['empId']){
                                            array_push($xassa,$emp['empName']);

                                        }

                                    }
                                }
                                $empmae=implode(",",$xassa);
                                
				$sheet->setCellValue('C'.$row,$empmae);
				$sheet->setCellValue('D'.$row,$task['projectName']);
				$promem=explode(",",$task['taskMem'] );
                                
                                 $xassa=array();
                                foreach ($promem as $key=>$value) {
                                    foreach($allemployee as $key2=>$emp){
                                        if($promem[$key] == $emp['empId']){
                                            array_push($xassa,$emp['empName']);

                                        }

                                    }
                                }
                                $taskmem=implode(",",$xassa);
				$sheet->setCellValue('E'.$row,$taskmem);
				
				
				$sheet->setCellValue('F'.$row,$task['taskTitle']);
                $sheet->setCellValue('G'.$row,$task['taskDesc']);
                $sheet->setCellValue('H'.$row,$task['taskSdate']);
                $sheet->setCellValue('I'.$row,$task['taskEdate']);
				if(in_array("Progress",$promemStatus) == 1 || in_array("Pending",$promemStatus)==1  && in_array("Complete",$promemStatus)==1  || in_array("Pending",$promemStatus) ==1  && in_array("Progress",$promemStatus)==1  || in_array("Progress",$promemStatus)  && in_array("Complete",$promemStatus)==1 ){
					

					
					$project = $this->Task_model->get_Task_time($task['taskId']);
					$stats="Progress";
					$countpro=count($project);
				$starttime=$project[0]['starting_time'];
				$timearr=explode(" ",$starttime);
				$stime=$timearr[1];
				
				
				$etime="";
				
				$totaltime="";
					
					
				
				}else if(in_array("Pending",$promemStatus)){
					
				$stats="Pending";
				$stime="";
				$etime="";
				$totaltime="";
				}
				else{
					
					$project = $this->Task_model->get_Task_time($task['taskId']);
					$countpro=count($project);
					$starttime=$project[0]['starting_time'];
					$timearr=explode(" ",$starttime);
					$stime=$timearr[1];
					$endtime=$project[$countpro-1]['end_time'];
					$timearre=explode(" ",$endtime);
					$starttime = date ("d-m-y H:i:s",strtotime($starttime));   
					$endtime = date ("d-m-y H:i:s",strtotime($endtime));   
					
					$date1 = strtotime($starttime); 
					$date2 = strtotime($endtime); 
					  
					$diff = abs($date2 - $date1); 
					  
					  
					$years = floor($diff / (365*60*60*24)); 
					  
					  
					$months = floor(($diff - $years * 365*60*60*24)
												   / (30*60*60*24)); 
					  
					  
					$days = floor(($diff - $years * 365*60*60*24 - 
								 $months*30*60*60*24)/ (60*60*24));
					  
					  
					$hours = floor(($diff - $years * 365*60*60*24 
						   - $months*30*60*60*24 - $days*60*60*24)
													   / (60*60)); 
					  
					  
					$minutes = floor(($diff - $years * 365*60*60*24 
							 - $months*30*60*60*24 - $days*60*60*24 
											  - $hours*60*60)/ 60); 
					  
					  
					$seconds = floor(($diff - $years * 365*60*60*24 
							 - $months*30*60*60*24 - $days*60*60*24
									- $hours*60*60 - $minutes*60)); 
					  
					
					$totaltime=$days ."-d " .$hours."-hr " .$minutes."-min " .$seconds."-sec";
					$etime=$timearre[1];
				
					$stats="Complete";
				}
			
				
				$sheet->setCellValue('J'.$row,$stats);
                $sheet->setCellValue('K'.$row,$task['priority']);
                
				$sheet->setCellValue('L'.$row,$stime);
                $sheet->setCellValue('M'.$row,$etime);
                $sheet->setCellValue('N'.$row,$totaltime);
				$row++;
			}
			$writer = new Xlsx($spreadsheet);
				$filename = 'tasks_data';
				header('Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition:attachment;filename='.$filename.'.xlsx;');
				header('Cache-Control:max-age-0;');
				$writer->save('php://output');
			
		}else{
			echo 'No data to export';
		}
		
	}
}

?>
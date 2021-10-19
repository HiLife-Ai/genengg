<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Project extends CI_Controller{
	
	public function index() {
		
		$this->load->model('Project_model');
		$data = array();
		if (isset($_COOKIE['empId'])) {
			if ($_COOKIE['empRole'] == 'General Manager') {
				$projects = $this->Project_model->all();
			    $allclient = $this->Project_model->getallclient();
				$allemployee = $this->Project_model->getallemployee();
				
				
				$data['totalemployee']=$allemployee;
				$data['totalclint']=$allclient;
				$data['projects'] = $projects;
			
				$this->load->view('admin/project/list',$data);
			}else if($_COOKIE['empRole'] == 'Project Manager'){
				
				$projects = $this->Project_model->all();
			    $allclient = $this->Project_model->getallclient();
				$allemployee = $this->Project_model->getallemployee();
				
				
				$data['totalemployee']=$allemployee;
				$data['totalclint']=$allclient;
				$data['projects'] = $projects;
				$this->load->view('pm/project/list',$data);
			} 
			else {
				$prodetail=array();
				$allemployee = $this->Project_model->getallemployee();
				$projects = $this->Project_model->getallproject();
				foreach ($projects as  $value) {
					$x=explode(",",$value['proMem']);
					if(in_array($_COOKIE['empId'],$x)){
						
						$projectdetail = $this->Project_model->getProjectByUser($value['proId']);
						array_push($prodetail,$projectdetail);
					}
				}

				$data['projects'] = $prodetail;
				$data['totalemployee']=$allemployee;
				$data['totalproject']=$projects;
				
								// echo $_COOKIE['empRole'];
				$this->load->view('emp/project/list',$data);
				
			}
		}
        
       
    }




    public function gm_index() {

        $this->load->model('Project_model');
		$data = array();
		if (isset($_COOKIE['empId'])) {
			if ($_COOKIE['empRole'] == 'General Manager') {
				$projects = $this->Project_model->all();
				$data['projects'] = $projects;
				$this->load->view('gm/project/list',$data);
			} else {

				$projects = $this->Project_model->getProjectByUser($_COOKIE['empName']);
				// $data['projects'] = $projects;
				// $this->load->view('emp/project/list',$data);
				echo $_COOKIE['empName'];
			}
		}
        
       
    }
    
	
	public function hm_index() {

        $this->load->model('Project_model');
		$data = array();
		if (isset($_COOKIE['empId'])) {
			
			$allclient = $this->Project_model->getallclient();
			$allemployee = $this->Project_model->getallemployee();
			$projects = $this->Project_model->all();
			$data['totalemployee']=$allemployee;
			$data['totalclint']=$allclient;
				$data['projects'] = $projects;
				$this->load->view('hm/project/list',$data);
		
		}
        
       
    }

    public function create() {
        $this->load->model('Project_model');
        $getEmployee = $this->Project_model->getEmployee();
        $getClient = $this->Project_model->getClient();
		$assignid = $this->Project_model->assign_id();
		
        $this->form_validation->set_rules('proId','Project ID','required');
        $this->form_validation->set_rules('proName','Project Name','required');
		$this->form_validation->set_rules('client','Planned Start Date','required');
		$this->form_validation->set_rules('scopeWork','Planned End Date','required');
		$this->form_validation->set_rules('planSdate','Scope Of Work','required');
		$this->form_validation->set_rules('planEdate','Client Project Number','required');
		$this->form_validation->set_rules('proMem[]','Project Team Members','required');
		$this->form_validation->set_rules('clnprono','Client Name','required');
		
		$this->form_validation->set_rules('proStatus','Project Status','required');
		
		
		
        if ($this->form_validation->run() == false) {
			if($assignid != []){

				$last_id=$assignid->proId;
				
			}else{
				$last_id="";
			}
			
			
			if(empty($last_id)){

				$proId = "GET-20-21-001";
}
else {

    $idd = str_replace("GET-20-21-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $proId = 'GET-20-21-'.$id;
}




$this->load->view('admin/project/create', ['getEmployee'=>$getEmployee, 'getClient'=>$getClient,'proId'=>$proId]);
        } else {
			// print_r($this->input->post ('proMem'));
			$propmem=$this->input->post ('proMem[]');
			$r=array();
			foreach($propmem as $y ){
				array_push($r,"Pending");
			}
			$za=implode(",",$r);
			$propmemnew=implode(",",$propmem);
            //save record to database
            $formArray = array();
            $formArray ['proId'] = $this->input->post ('proId');
            $formArray ['proName'] = $this->input->post ('proName');
			$formArray ['client'] = $this->input->post ('client');
			$formArray ['scopeWork'] = $this->input->post ('scopeWork');
			$formArray ['planSdate'] = $this->input->post ('planSdate');
			$formArray ['planEdate'] = $this->input->post ('planEdate');
			$formArray ['proMem'] = $propmemnew;
			$formArray ['proMemStatus'] = $za;
			$formArray ['clnprono'] = $this->input->post ('clnprono');
			$formArray ['actualDate'] = $this->input->post ('actualDate');
			$formArray ['proStatus'] = $this->input->post ('proStatus');
			$formArray ['proRemarks'] = $this->input->post ('proRemarks');
			$formArray ['created_at'] = date_default_timezone_set('Asia/Kolkata');date ('d-m-y H:i:s');
            $this->Project_model->create($formArray);
            $this->session->set_flashdata('success','Project created successfully!');
            redirect(base_url().'index.php/project/index');
        }    
		
    }
    public function gm_create() {
		$this->load->model('Project_model');
        $getEmployee = $this->Project_model->getEmployee();
        $getClient = $this->Project_model->getClient();
		
        $this->form_validation->set_rules('proId','Project ID','required');
        $this->form_validation->set_rules('proName','Project Name','required');
		$this->form_validation->set_rules('client','Planned Start Date','required');
		$this->form_validation->set_rules('scopeWork','Planned End Date','required');
		$this->form_validation->set_rules('planSdate','Scope Of Work','required');
		$this->form_validation->set_rules('planEdate','Client Project Number','required');
		$this->form_validation->set_rules('proMem[]','Project Team Members','required');
		$this->form_validation->set_rules('clnprono','Client Name','required');
		
		$this->form_validation->set_rules('proStatus','Project Status','required');
		
		
		
        if ($this->form_validation->run() == false) {
			$assignid = $this->Project_model->assign_id();
			$last_id=$assignid->proId;

			
if(empty($last_id)){

    $proId = "GET-20-21-001";
}
else {

    $idd = str_replace("GET-20-21-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $proId = 'GET-20-21-'.$id;
}

$this->load->view('gm/project/create', ['getEmployee'=>$getEmployee, 'getClient'=>$getClient,'proId' => $proId]);
        } else {
			// print_r($this->input->post ('proMem'));
			$propmem=$this->input->post ('proMem[]');
			$propmemnew=implode(",",$propmem);
            //save record to database
            $formArray = array();
            $formArray ['proId'] = $this->input->post ('proId');
            $formArray ['proName'] = $this->input->post ('proName');
			$formArray ['client'] = $this->input->post ('client');
			$formArray ['scopeWork'] = $this->input->post ('scopeWork');
			$formArray ['planSdate'] = $this->input->post ('planSdate');
			$formArray ['planEdate'] = $this->input->post ('planEdate');
			$formArray ['proMem'] = $propmemnew;
			$formArray ['clnprono'] = $this->input->post ('clnprono');
			$formArray ['actualDate'] = $this->input->post ('actualDate');
			$formArray ['proStatus'] = $this->input->post ('proStatus');
			$formArray ['proRemarks'] = $this->input->post ('proRemarks');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Project_model->create($formArray);
            $this->session->set_flashdata('success','Project created successfully!');
            redirect(base_url().'index.php/project/gm_index');
        }    
		
    }

	public function pm_create() {
		$this->load->model('Project_model');
		$getEmployee = $this->Project_model->getEmployee();
		$getClient = $this->Project_model->getClient();
		
		$this->form_validation->set_rules('proId','Project ID','required');
		$this->form_validation->set_rules('proName','Project Name','required');
		$this->form_validation->set_rules('client','Planned Start Date','required');
		$this->form_validation->set_rules('scopeWork','Planned End Date','required');
		$this->form_validation->set_rules('planSdate','Scope Of Work','required');
		$this->form_validation->set_rules('planEdate','Client Project Number','required');
		$this->form_validation->set_rules('proMem[]','Project Team Members','required');
		$this->form_validation->set_rules('clnprono','Client Name','required');
		
		$this->form_validation->set_rules('proStatus','Project Status','required');
		
		
		
		if ($this->form_validation->run() == false) {

			$assignid = $this->Project_model->assign_id();
			if($assignid != []){
                
				$last_id=$assignid->proId;
			}else{
				$last_id="";
			}
			
			
			
			if(empty($last_id)){
			
			$proId = "GET-20-21-001";
			}
			else {
			
			$idd = str_replace("GET-20-21-","",$last_id);
			$id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
			$proId = 'GET-20-21-'.$id;
			}
			$this->load->view('pm/project/create', ['getEmployee'=>$getEmployee, 'getClient'=>$getClient,'proId'=>$proId ],);
		} else {
			// print_r($this->input->post ('proMem'));
			$propmem=$this->input->post ('proMem[]');
			$r=array();
			foreach($propmem as $y ){
				array_push($r,"Pending");
			}
			$za=implode(",",$r);
			$propmemnew=implode(",",$propmem);
			//save record to database
			$formArray = array();
			$formArray ['proId'] = $this->input->post ('proId');
			$formArray ['proName'] = $this->input->post ('proName');
			$formArray ['client'] = $this->input->post ('client');
			$formArray ['scopeWork'] = $this->input->post ('scopeWork');
			$formArray ['planSdate'] = $this->input->post ('planSdate');
			$formArray ['planEdate'] = $this->input->post ('planEdate');
			$formArray ['proMem'] = $propmemnew;
			$formArray ['proMemStatus'] = $za;
			$formArray ['clnprono'] = $this->input->post ('clnprono');
			$formArray ['actualDate'] = $this->input->post ('actualDate');
			$status=$this->input->post ('proStatus');
			if($status == "In Progress"){
				
				$formArray ['project_start_time'] = date ('d-m-y H:i:s');
			}
			$formArray ['proStatus'] = $this->input->post ('proStatus');
			$formArray ['proRemarks'] = $this->input->post ('proRemarks');
			$formArray ['created_at'] = date ('d-m-y H:i:s');
			$this->Project_model->create($formArray);
			$this->session->set_flashdata('success','Project created successfully!');
			redirect(base_url().'index.php/project/index');
		}    
		
	}


    public function pm_edit($projectId){
		$this->load->model('Project_model');
        $project = $this->Project_model->getProject($projectId);
		$getEmployee = $this->Project_model->getEmployee();
		$getClient = $this->Project_model->getClient();
		
        $data = array();
        $data['project'] = $project;
        $data['id'] = $projectId;
		$data['getEmployee']=$getEmployee;
		$data['getClient']=$getClient;
		
		$this->form_validation->set_rules('proId','Project ID','required');
        $this->form_validation->set_rules('proName','Project Name','required');
		$this->form_validation->set_rules('client','Planned Start Date','required');
		$this->form_validation->set_rules('scopeWork','Planned End Date','required');
		$this->form_validation->set_rules('planSdate','Scope Of Work','required');
		$this->form_validation->set_rules('planEdate','Client Project Number','required');
		$this->form_validation->set_rules('proMem[]','Project Team Members','required');
		$this->form_validation->set_rules('clnprono','Client Name','required');
		
// 		$this->form_validation->set_rules('proStatus','Project Status','required');
		
		
		
        if ($this->form_validation->run() == false) {
			
            $this->load->view('pm/project/edit',$data);
        } else {
			// update project record
			$propmeme=explode(",",$project['proMem']);
			$propemestatus=explode(",",$project['proMemStatus']);

			$propmem=$this->input->post ('proMem[]');
			
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
            $formArray = array();
			$formArray ['proId'] = $this->input->post ('proId');
            $formArray ['proName'] = $this->input->post ('proName');
			$formArray ['client'] = $this->input->post ('client');
			$formArray ['scopeWork'] = $this->input->post ('scopeWork');
			$formArray ['planSdate'] = $this->input->post ('planSdate');
			$formArray ['planEdate'] = $this->input->post ('planEdate');
			$formArray ['proMem'] =$za;
			$formArray ['proMemStatus'] =$propmemnew;
			$formArray ['clnprono'] = $this->input->post ('clnprono');
			$formArray ['actualDate'] = $this->input->post ('actualDate');
			$formArray ['proStatus'] = $this->input->post ('proStatus');
			$formArray ['proRemarks'] = $this->input->post ('proRemarks');
			$formArray ['created_at'] = date ('d-m-y H:i:s');
            $this->Project_model->updateProject($projectId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');

            redirect(base_url().'index.php/project/index');
        }  
    }

    public function edit($projectId){
		$this->load->model('Project_model');
        $project = $this->Project_model->getProject($projectId);
		$getEmployee = $this->Project_model->getEmployee();
		$getClient = $this->Project_model->getClient();
        $data = array();
        $data['project'] = $project;
        $data['id'] = $projectId;
		$data['getEmployee']=$getEmployee;
		$data['getClient']=$getClient;
		
		$this->form_validation->set_rules('proId','Project ID','required');
        $this->form_validation->set_rules('proName','Project Name','required');
		$this->form_validation->set_rules('client','Planned Start Date','required');
		$this->form_validation->set_rules('scopeWork','Planned End Date','required');
		$this->form_validation->set_rules('planSdate','Scope Of Work','required');
		$this->form_validation->set_rules('planEdate','Client Project Number','required');
		$this->form_validation->set_rules('proMem[]','Project Team Members','required');
		$this->form_validation->set_rules('clnprono','Client Name','required');
		
		$this->form_validation->set_rules('proStatus','Project Status','required');
		
		
		
        if ($this->form_validation->run() == false) {
			
			$this->load->view('admin/project/edit',$data);
        } else {
			// update project record
			$propmeme=explode(",",$project['proMem']);
			$propemestatus=explode(",",$project['proMemStatus']);

			$propmem=$this->input->post ('proMem[]');
			
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
            $formArray = array();
			$formArray ['proId'] = $this->input->post ('proId');
            $formArray ['proName'] = $this->input->post ('proName');
			$formArray ['client'] = $this->input->post ('client');
			$formArray ['scopeWork'] = $this->input->post ('scopeWork');
			$formArray ['planSdate'] = $this->input->post ('planSdate');
			$formArray ['planEdate'] = $this->input->post ('planEdate');
			$formArray ['proMem'] =$za;
			$formArray ['proMemStatus'] =$propmemnew;
			$formArray ['clnprono'] = $this->input->post ('clnprono');
			$formArray ['actualDate'] = $this->input->post ('actualDate');
			$formArray ['proStatus'] = $this->input->post ('proStatus');
			$formArray ['proRemarks'] = $this->input->post ('proRemarks');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Project_model->updateProject($projectId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/project/index');
        }  
    }
	
    public function gm_edit($projectId){
		$this->load->model('Project_model');
        $project = $this->Project_model->getProject($projectId);
		$getEmployee = $this->Project_model->getEmployee();
		$getClient = $this->Project_model->getClient();
		
        $data = array();
        $data['project'] = $project;
        $data['id'] = $projectId;
		$data['getEmployee']=$getEmployee;
		$data['getClient']=$getClient;
		
		$this->form_validation->set_rules('proId','Project ID','required');
        $this->form_validation->set_rules('proName','Project Name','required');
		$this->form_validation->set_rules('client','Planned Start Date','required');
		$this->form_validation->set_rules('scopeWork','Planned End Date','required');
		$this->form_validation->set_rules('planSdate','Scope Of Work','required');
		$this->form_validation->set_rules('planEdate','Client Project Number','required');
		$this->form_validation->set_rules('proMem[]','Project Team Members','required');
		$this->form_validation->set_rules('clnprono','Client Name','required');
		
		$this->form_validation->set_rules('proStatus','Project Status','required');
		
		

        if ($this->form_validation->run() == false) {
			
            $this->load->view('gm/project/edit',$data);
        } else {
			// update project record
			$propmeme=explode(",",$project['proMem']);
			$propemestatus=explode(",",$project['proMemStatus']);

			$propmem=$this->input->post ('proMem[]');
			
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
            $formArray = array();
			$formArray ['proId'] = $this->input->post ('proId');
            $formArray ['proName'] = $this->input->post ('proName');
			$formArray ['client'] = $this->input->post ('client');
			$formArray ['scopeWork'] = $this->input->post ('scopeWork');
			$formArray ['planSdate'] = $this->input->post ('planSdate');
			$formArray ['planEdate'] = $this->input->post ('planEdate');
			$formArray ['proMem'] =$za;
			$formArray ['proMemStatus'] =$propmemnew;
			$formArray ['clnprono'] = $this->input->post ('clnprono');
			$formArray ['actualDate'] = $this->input->post ('actualDate');
			$formArray ['proStatus'] = $this->input->post ('proStatus');
			$formArray ['proRemarks'] = $this->input->post ('proRemarks');
			date_default_timezone_set('Asia/Kolkata');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Project_model->updateProject($projectId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/project/gm_index');
        }  
    }
	
    public function delete($projectId) {
		$this->load->model('Project_model');
        $project = $this->Project_model->getProject($projectId);
        if (empty($project)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/project/index');
        }
		
        $this->Project_model->deleteProject($projectId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/project/index');
    }
    
	
	public function pm_delete($projectId) {
		$this->load->model('Project_model');
        $project = $this->Project_model->getProject($projectId);
        if (empty($project)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/project/index');
        }
		
        $this->Project_model->deleteProject($projectId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/project/index');
    }
    
	public function gm_delete($projectId) {
		$this->load->model('Project_model');
        $project = $this->Project_model->getProject($projectId);
        if (empty($project)) {
			$this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/project/gm_index');
        }

        $this->Project_model->deleteProject($projectId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/project/gm_index');
    }

    public function __construct(){
		
		parent::__construct();
		$this->load->database();
		$this->load->model('Project_model');
		$this->load->helper('url');
	}
	
	public function register(){
		$projects = $this->Project_model->all();
		redirect(base_url().'index.php/project/index');
	}
	
	

	
	public function upd_date(){
		$formArray = array();
		$projectid = $this->input->post ('proid000');
		$propmem = $this->input->post ('propmem');
		if($propmem == "In Progress"){
			date_default_timezone_set('Asia/Kolkata');
			$formArray['project_start_time'] =date('d-m-y H:i:s');
		}else if($propmem == "Finished"){
		    date_default_timezone_set('Asia/Kolkata');
			
			$formArray['project_end_time'] =date('d-m-y H:i:s');
		}
		$formArray['proStatus'] =$propmem;
		$this->Project_model->updateProject($projectid,$formArray);
		$this->session->set_flashdata('success','Record updated successfully');
		

		
		redirect(base_url().'index.php/project/index');
		

	}
	
	public function data(){
		$projects = $this->Project_model->all();
		$allemployee = $this->Project_model->getallemployee();
	
		if(count($projects)>0){
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1','Sl. No');
			$sheet->setCellValue('B1','PROJECT ID');
			$sheet->setCellValue('C1','PROJECT NAME');
			$sheet->setCellValue('D1','PROJECT MEMBERS');
			$sheet->setCellValue('E1','CLIENT NAME');
			$sheet->setCellValue('F1','CLIENT PROJECT NUMBER');
			$sheet->setCellValue('G1','SCOPE OF WORK');
			$sheet->setCellValue('H1','PLAN START DATE');
            $sheet->setCellValue('I1','PLAN END DATE');
            $sheet->setCellValue('J1','ACTUAL END DATE');
            $sheet->setCellValue('K1','STATUS');
            $sheet->setCellValue('L1','PROJECT START TIME');
            $sheet->setCellValue('M1','PROJECT END TIME');
            $sheet->setCellValue('N1','Total Hours');
            $sheet->setCellValue('O1','REMARKS');
			$row =2;
			$coun=0;
			foreach($projects as $project){
				$coun++;

				$sheet->setCellValue('A'.$row,$coun);
				$sheet->setCellValue('B'.$row,$project['proId']);
				$sheet->setCellValue('C'.$row,$project['proName']);
				 
                 $promem=explode(",",$project['proMem']);
                                  $xassa=array();
                                 foreach ($promem as $key=>$value) {
                                     foreach($allemployee as $key2=>$emp){
                                         if($promem[$key] == $emp['empId']){
                                             array_push($xassa,$emp['empName']);
 
                                         }
 
                                     }
                                 }
                                 $propner=implode(",",$xassa);
                                                  
                                                   
                             
                                                                       
                                  
				$sheet->setCellValue('D'.$row,$propner);
				$sheet->setCellValue('E'.$row,$project['client']);
                $sheet->setCellValue('F'.$row,$project['clnprono']);
                $sheet->setCellValue('G'.$row,$project['scopeWork']);
                $sheet->setCellValue('H'.$row,$project['planSdate']);
                $sheet->setCellValue('I'.$row,$project['planEdate']);
                $sheet->setCellValue('J'.$row,$project['actualDate']);
                $sheet->setCellValue('K'.$row,$project['proStatus']);
                
				$starttime=$project['project_start_time'];
				if($starttime != ""){

					$timearr=explode(" ",$starttime);
					$stime=$timearr[1];
				}else{
					
					$stime="";
				}

				$endtime=$project['project_end_time'];
				if($endtime != ""){

					$timearre=explode(" ",$endtime);
					$etime=$timearre[1];
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

				}else{
					$etime="";
					$totaltime="";

				}
				

				$sheet->setCellValue('L'.$row,$stime);
                $sheet->setCellValue('M'.$row,$etime);
                $sheet->setCellValue('N'.$row,$totaltime);
				$sheet->setCellValue('O'.$row,$project['proRemarks']);
                

				
				$row++;
			}
			$writer = new Xlsx($spreadsheet);
				$filename = 'projects_data';
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
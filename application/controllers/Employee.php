<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Employee extends CI_Controller{
    
    public function index() {

        $this->load->model('Employee_model');
        $employees = $this->Employee_model->all();
        $data = array();
        $data['employees'] = $employees;
        $this->load->view('admin/employee/list', $data);
    }
    public function hr_index() {

        $this->load->model('Employee_model');
        $employees = $this->Employee_model->all();
        $data = array();
        $data['employees'] = $employees;
        $this->load->view('hm/employee/list', $data);
    }
    public function create() {

        $this->load->model('employee_model');
        $getGender = $this->employee_model->getGender();
        $getRole = $this->employee_model->getRole();
        // $getId = $this->employee_model->getId();
        $assignid = $this->employee_model->assign_id();
        
        $this->form_validation->set_rules('empId','Employee ID');
        $this->form_validation->set_rules('empName','Employee Name','required');
        $this->form_validation->set_rules('empMail','Employee Email','required|valid_email');
        $this->form_validation->set_rules('empPwd','Password','required');
        $this->form_validation->set_rules('dob','Date Of Birth','required');
        $this->form_validation->set_rules('empPhone','Employee Phone','required');
        $this->form_validation->set_rules('empGender','Gender','required');
        $this->form_validation->set_rules('empAdd','Address','required');
        $this->form_validation->set_rules('empSkill','Skills','required');
        $this->form_validation->set_rules('experience','Year of Experience','required');
        $this->form_validation->set_rules('empRole','Designation','required');
        $this->form_validation->set_rules('joinDate','Joining Date','required');
        

        if ($this->form_validation->run() == false) {
            if($assignid != []){
                
				$last_id=$assignid->empId;
			}else{
				$last_id="";
			}
            if(empty($last_id)){
                
    $empId = "GET-001";
}
else {
    
    
    $idd = str_replace("GET-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);

    $empId = 'GET-'.$id;
}
$this->load->view('admin/employee/create', ['getGender'=>$getGender, 'getRole'=>$getRole,'empId' => $empId]);
} else {
    
    $formArray = array();
    $formArray ['empId'] = $this->input->post ('empId');
    $formArray ['empName'] = $this->input->post ('empName');
    $formArray ['empMail'] = $this->input->post ('empMail');
    $formArray ['empPwd'] = $this->input->post ('empPwd');
    $formArray ['dob'] = $this->input->post ('dob');
    $formArray ['empPhone'] = $this->input->post ('empPhone');
    $formArray ['empGender'] = $this->input->post ('empGender');
    $formArray ['empAdd'] = $this->input->post ('empAdd');
			$formArray ['empSkill'] = $this->input->post ('empSkill');
			$formArray ['empRole'] = $this->input->post ('empRole');
			$formArray ['joinDate'] = $this->input->post ('joinDate');
			$formArray ['endDate'] = $this->input->post ('endDate');
            $formArray ['experience'] = $this->input->post ('experience');
			$formArray ['remark'] = $this->input->post ('remark');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->employee_model->create($formArray);
            $this->session->set_flashdata('success','Employee created successfully!');
            redirect(base_url().'index.php/employee/index');
        }    
    }
    
    
    public function hr_create() {
        
        $this->load->model('employee_model');
        $getGender = $this->employee_model->getGender();
        $getRole = $this->employee_model->getRole();
        // $getId = $this->employee_model->getId();

        $this->form_validation->set_rules('empId','Employee ID');
        $this->form_validation->set_rules('empName','Employee Name','required');
        $this->form_validation->set_rules('empMail','Employee Email','required|valid_email');
        $this->form_validation->set_rules('empPwd','Password','required');
        $this->form_validation->set_rules('dob','Date Of Birth','required');
        $this->form_validation->set_rules('empPhone','Employee Phone','required');
        $this->form_validation->set_rules('empGender','Gender','required');
        $this->form_validation->set_rules('empAdd','Address','required');
        $this->form_validation->set_rules('empSkill','Skills','required');
        $this->form_validation->set_rules('experience','Year of Experience','required');
        $this->form_validation->set_rules('empRole','Designation','required');
        $this->form_validation->set_rules('joinDate','Joining Date','required');
        
        
        if ($this->form_validation->run() == false) {
            $assignid = $this->employee_model->assign_id();
            if($assignid != []){
                
				$last_id=$assignid->empId;
			}else{
				$last_id="";
			}

            if(empty($last_id)){
                
                $empId = "GET-001";
            }
            else {
                
                $idd = str_replace("GET-","",$last_id);
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $empId = 'GET-'.$id;
            }
            
            $this->load->view('hm/employee/create', ['getGender'=>$getGender, 'getRole'=>$getRole,'empId'=>$empId]);
        } else {
            //save record to database
            $formArray = array();
            $formArray ['empId'] = $this->input->post ('empId');
            $formArray ['empName'] = $this->input->post ('empName');
			$formArray ['empMail'] = $this->input->post ('empMail');
			$formArray ['empPwd'] = $this->input->post ('empPwd');
			$formArray ['dob'] = $this->input->post ('dob');
			$formArray ['empPhone'] = $this->input->post ('empPhone');
			$formArray ['empGender'] = $this->input->post ('empGender');
			$formArray ['empAdd'] = $this->input->post ('empAdd');
			$formArray ['empSkill'] = $this->input->post ('empSkill');
			$formArray ['empRole'] = $this->input->post ('empRole');
			$formArray ['joinDate'] = $this->input->post ('joinDate');
			$formArray ['endDate'] = $this->input->post ('endDate');
            $formArray ['experience'] = $this->input->post ('experience');
			$formArray ['remark'] = $this->input->post ('remark');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->employee_model->create($formArray);
            $this->session->set_flashdata('success','Employee created successfully!');
            redirect(base_url().'index.php/employee/hr_index');
        }    
    }

    public function edit($empId){
        $this->load->model('employee_model');
        $employee = $this->employee_model->getEmployee($empId);
        $getRole = $this->employee_model->getRole();
        $data = array();
        $data['employee'] = $employee;
        $data['getRole'] = $getRole;

        $this->form_validation->set_rules('empName','Employee Name','required');
        $this->form_validation->set_rules('empMail','Employee Email','required|valid_email');
        $this->form_validation->set_rules('empPwd','Password','required');
        $this->form_validation->set_rules('dob','Date Of Birth','required');
        $this->form_validation->set_rules('empPhone','Employee Phone','required');
        $this->form_validation->set_rules('empGender','Gender','required');
        $this->form_validation->set_rules('empAdd','Address','required');
        $this->form_validation->set_rules('empSkill','Skills','required');
        $this->form_validation->set_rules('experience','Year of Experience','required');
        $this->form_validation->set_rules('empRole','Designation','required');
        $this->form_validation->set_rules('joinDate','Joining Date','required');
        


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/employee/edit',$data);
        } else {
            // update employee record
            $formArray = array();
            $formArray ['empName'] = $this->input->post ('empName');
			$formArray ['empMail'] = $this->input->post ('empMail');
			$formArray ['empPwd'] = $this->input->post ('empPwd');
			$formArray ['dob'] = $this->input->post ('dob');
			$formArray ['empPhone'] = $this->input->post ('empPhone');
			$formArray ['empGender'] = $this->input->post ('empGender');
			$formArray ['empAdd'] = $this->input->post ('empAdd');
			$formArray ['empSkill'] = $this->input->post ('empSkill');
			$formArray ['empRole'] = $this->input->post ('empRole');
			$formArray ['joinDate'] = $this->input->post ('joinDate');
			$formArray ['endDate'] = $this->input->post ('endDate');
            $formArray ['experience'] = $this->input->post ('experience');
			$formArray ['remark'] = $this->input->post ('remark');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->employee_model->updateEmployee($empId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/employee/index');
        }  
    }

    public function delete($empId) {
        $this->load->model('employee_model');
        $employee = $this->employee_model->getEmployee($empId);
        if (empty($employee)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/employee/index');
        }

        $this->employee_model->deleteEmployee($empId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/employee/index');
    }
    
    
    
    
    public function hr_edit($empId){
        $this->load->model('employee_model');
        $employee = $this->employee_model->getEmployee($empId);
        $data = array();
        $data['employee'] = $employee;

        $this->form_validation->set_rules('empName','Employee Name','required');
        $this->form_validation->set_rules('empMail','Employee Email','required|valid_email');
        $this->form_validation->set_rules('empPwd','Password','required');
        $this->form_validation->set_rules('dob','Date Of Birth','required');
        $this->form_validation->set_rules('empPhone','Employee Phone','required');
        $this->form_validation->set_rules('empGender','Gender','required');
        $this->form_validation->set_rules('empAdd','Address','required');
        $this->form_validation->set_rules('empSkill','Skills','required');
        $this->form_validation->set_rules('experience','Year of Experience','required');
        $this->form_validation->set_rules('empRole','Designation','required');
        $this->form_validation->set_rules('joinDate','Joining Date','required');
        


        if ($this->form_validation->run() == false) {
            $this->load->view('hm/employee/edit',$data);
        } else {
            // update employee record
            $formArray = array();
            $formArray ['empName'] = $this->input->post ('empName');
			$formArray ['empMail'] = $this->input->post ('empMail');
			$formArray ['empPwd'] = $this->input->post ('empPwd');
			$formArray ['dob'] = $this->input->post ('dob');
			$formArray ['empPhone'] = $this->input->post ('empPhone');
			$formArray ['empGender'] = $this->input->post ('empGender');
			$formArray ['empAdd'] = $this->input->post ('empAdd');
			$formArray ['empSkill'] = $this->input->post ('empSkill');
			$formArray ['empRole'] = $this->input->post ('empRole');
			$formArray ['joinDate'] = $this->input->post ('joinDate');
			$formArray ['endDate'] = $this->input->post ('endDate');
            $formArray ['experience'] = $this->input->post ('experience');
			$formArray ['remark'] = $this->input->post ('remark');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->employee_model->updateEmployee($empId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/employee/hr_index');
        }  
    }
    public function hr_delete($empId) {
        $this->load->model('employee_model');
        $employee = $this->employee_model->getEmployee($empId);
        if (empty($employee)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/employee/hr_index');
        }

        $this->employee_model->deleteEmployee($empId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/employee/hr_index');
    }
    
    public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model('employee_model');
		$this->load->helper('url');
	}
	
	public function register(){
		$employees = $this->employee_model->all();
		redirect(base_url().'index.php/employee/index');
	}
	
	public function data(){
		$employees = $this->employee_model->all();
        if(count($employees)>0){
            

            

                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1','Sl.No');
                $sheet->setCellValue('B1','Emp Code');
                $sheet->setCellValue('C1','NAME');
                $sheet->setCellValue('D1','Email');
                $sheet->setCellValue('E1','Position');
                $sheet->setCellValue('F1','Joining Date');
                $sheet->setCellValue('F1','Year of Experience');
                $sheet->setCellValue('G1','DOB.');
                $sheet->setCellValue('H1','Phone.');
                $sheet->setCellValue('I1','Remarks');
                $row =2;
                $coun=0;
                foreach($employees as $employe){
                    $coun++;

                    $sheet->setCellValue('A'.$row,$coun);
                    $sheet->setCellValue('B'.$row,$employe['empId']);
                    $sheet->setCellValue('C'.$row,$employe['empName']);
                    $sheet->setCellValue('D'.$row,$employe['empMail']);
                    $sheet->setCellValue('E'.$row,$employe['empRole']);
                    $sheet->setCellValue('F'.$row,$employe['joinDate']);
                    $sheet->setCellValue('F'.$row,$employe['experience']);
                    $sheet->setCellValue('G'.$row,$employe['dob']);
                    $sheet->setCellValue('H'.$row,$employe['empPhone']);
                    $sheet->setCellValue('I'.$row,$employe['remark']);
                    $row++;
                }
                $writer = new Xlsx($spreadsheet);
                    $filename = 'employee_data';
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
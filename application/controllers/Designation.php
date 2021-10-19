<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Designation extends CI_Controller{
    
    public function index() {

        $this->load->model('Designation_model');
        $designations = $this->Designation_model->all();
        $data = array();
        $data['designations'] = $designations;
        $this->load->view('admin/designation/list',$data);
    }

    public function create() {
$role=array();
        $this->load->model('designation_model');

        $this->form_validation->set_rules('id','Designation ID');
        $assignid = $this->designation_model->assign_id();
        $this->form_validation->set_rules('role','Designation Name','required');

        if ($this->form_validation->run() == false) {
            $last_id=$assignid->id;
            if(empty($last_id)){

                $roleId = "GEB-001";
            }
            else {
            
                $idd = str_replace("GEB-","",$last_id);
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $roleId = 'GEB-'.$id;
            }
            $role['roleId']=$roleId;


            $this->load->view('admin/designation/create',$role);
        } else {
            //save record to database
            $formArray = array();
            $formArray ['id'] = $this->input->post ('id');
            $formArray ['role'] = $this->input->post ('role');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->designation_model->create($formArray);
            $this->session->set_flashdata('success','Designation created successfully!');
            redirect(base_url().'index.php/designation/index');
        }    
    }

    public function edit($roleId){
        $this->load->model('designation_model');
        $designation = $this->designation_model->getdesignation($roleId);
        $data = array();
        $data['designation'] = $designation;

        $this->form_validation->set_rules('id','Designation ID');
        $this->form_validation->set_rules('role','Designation Name','required');


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/designation/edit',$data);
        } else {
            // update designation record
            $formArray ['id'] = $this->input->post ('id');
            $formArray ['role'] = $this->input->post ('role');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->designation_model->updateDesignation($roleId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/designation/index');
        }  
    }

    public function delete($roleId) {
        $this->load->model('designation_model');
        $designation = $this->designation_model->getDesignation($roleId);
        if (empty($designation)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/designation/index');
        }

        $this->designation_model->deleteDesignation($roleId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/designation/index');
    }

    public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model('employee_model');
		$this->load->model('designation_model');
		$this->load->helper('url');
	}
	
	public function register(){
		$employees = $this->employee_model->all();
		redirect(base_url().'index.php/employee/index');
	}
	
	public function data(){
		$tasks = $this->designation_model->all();

        if(count($tasks)>0){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1','Sl. No.');
                $sheet->setCellValue('B1','Designations Code');
                $sheet->setCellValue('C1','Designations');
                $sheet->setCellValue('D1','Remarks');
                $row =2;
                $coun=0;
                foreach($tasks as $task){
                    $coun++;
                    $sheet->setCellValue('A'.$row,$coun);
                    $sheet->setCellValue('B'.$row,$task['id']);
                    $sheet->setCellValue('C'.$row,$task['role']);
                    $sheet->setCellValue('D'.$row,"");
                    
    
                    $row++;
                }
                $writer = new Xlsx($spreadsheet);
                    $filename = 'designation_data';
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
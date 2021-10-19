<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Client extends CI_Controller{

    public function index() {

        $this->load->model('Client_model');
        $clients = $this->Client_model->all();
        $data = array();
        $data['clients'] = $clients;
        $this->load->view('admin/client/list',$data);
    }
    
	public function gm_index() {

        $this->load->model('Client_model');
        $clients = $this->Client_model->all();
        $data = array();
        $data['clients'] = $clients;
        $this->load->view('gm/client/list',$data);
    }
	
    public function create() {
		$this->load->model('Client_model');
		$clientid = $this->Client_model->client_id();
		
		$this->form_validation->set_rules('clnId','Client ID');
        $this->form_validation->set_rules('clnName','Client Name','required');
		$this->form_validation->set_rules('clnMail','Client Email','required|valid_email');
		$this->form_validation->set_rules('consName','Consultant Name','required');
		$this->form_validation->set_rules('contName','Contact Person Name','required');
		$this->form_validation->set_rules('contPhone','Contact Person Number','required');
		$this->form_validation->set_rules('clnAdd','Address','required');
		$this->form_validation->set_rules('orderDate','First Order Date','required');
		$this->form_validation->set_rules('clnStatus','Satus','required');
		
		
        if ($this->form_validation->run() == false) {
			$cienid=array();
			if($clientid != []){

				$last_id=$clientid->clnId;
			}else{
				$last_id="";
			}
				if(empty($last_id)){
					
					$clnId = "GEN-CL-001";
				}
			else {
			
				$idd = str_replace("GEN-CL-","",$last_id);
				$id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
				$clnId = 'GEN-CL-'.$id;
			}
			$cienid['clnId']=$clnId;
            $this->load->view('admin/client/create',$cienid);
        } else {
            //save record to database
            $formArray = array();

			$formArray ['clnId'] = $this->input->post ('clnId');
            $formArray ['clnName'] = $this->input->post ('clnName');
			$formArray ['clnMail'] = $this->input->post ('clnMail');
			$formArray ['consName'] = $this->input->post ('consName');
			$formArray ['contName'] = $this->input->post ('contName');
			$formArray ['contPhone'] = $this->input->post ('contPhone');
			$formArray ['clnAdd'] = $this->input->post ('clnAdd');
			$formArray ['orderDate'] = $this->input->post ('orderDate');
			$formArray ['clnStatus'] = $this->input->post ('clnStatus');
			$formArray ['clnRating'] = $this->input->post ('clnRating');
			$formArray ['clnremark'] = $this->input->post ('clnremark');
			$formArray ['clnnote'] = $this->input->post ('clnnote');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Client_model->create($formArray);
            $this->session->set_flashdata('success','Client created successfully!');
            redirect(base_url().'index.php/client/index');
        }    
    }

	public function gm_create() {
        $this->load->model('Client_model');

		$this->form_validation->set_rules('clnId','Client ID');
        $this->form_validation->set_rules('clnName','Client Name','required');
		$this->form_validation->set_rules('clnMail','Client Email','required|valid_email');
		$this->form_validation->set_rules('consName','Consultant Name','required');
		$this->form_validation->set_rules('contName','Contact Person Name','required');
		$this->form_validation->set_rules('contPhone','Contact Person Number','required');
		$this->form_validation->set_rules('clnAdd','Address','required');
		$this->form_validation->set_rules('orderDate','First Order Date','required');
		$this->form_validation->set_rules('clnStatus','Satus','required');
		

        if ($this->form_validation->run() == false) {
            $this->load->view('gm/client/create');
        } else {
            //save record to database
            $formArray = array();

			$formArray ['clnId'] = $this->input->post ('clnId');
            $formArray ['clnName'] = $this->input->post ('clnName');
			$formArray ['clnMail'] = $this->input->post ('clnMail');
			$formArray ['consName'] = $this->input->post ('consName');
			$formArray ['contName'] = $this->input->post ('contName');
			$formArray ['contPhone'] = $this->input->post ('contPhone');
			$formArray ['clnAdd'] = $this->input->post ('clnAdd');
			$formArray ['orderDate'] = $this->input->post ('orderDate');
			$formArray ['clnRating'] = $this->input->post ('clnRating');
			$formArray ['clnStatus'] = $this->input->post ('clnStatus');
			$formArray ['clnremark'] = $this->input->post ('clnremark');
			$formArray ['clnnote'] = $this->input->post ('clnnote');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Client_model->create($formArray);
            $this->session->set_flashdata('success','Client created successfully!');
            redirect(base_url().'index.php/client/gm_index');
        }    
    }

    public function edit($clnId){
        $this->load->model('Client_model');
        $client = $this->Client_model->getClient($clnId);
        $data = array();
        $data['client'] = $client;

        $this->form_validation->set_rules('clnId','Client ID');
        $this->form_validation->set_rules('clnName','Client Name','required');
		$this->form_validation->set_rules('clnMail','Client Email','required|valid_email');
		$this->form_validation->set_rules('consName','Consultant Name','required');
		$this->form_validation->set_rules('contName','Contact Person Name','required');
		$this->form_validation->set_rules('contPhone','Contact Person Number','required');
		$this->form_validation->set_rules('clnAdd','Address','required');
		$this->form_validation->set_rules('orderDate','First Order Date','required');
		$this->form_validation->set_rules('clnStatus','Satus','required');
	

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/client/edit',$data);
        } else {
            // update client record
            $formArray = array();
            $formArray ['clnId'] = $this->input->post ('clnId');
            $formArray ['clnName'] = $this->input->post ('clnName');
			$formArray ['clnMail'] = $this->input->post ('clnMail');
			$formArray ['consName'] = $this->input->post ('consName');
			$formArray ['contName'] = $this->input->post ('contName');
			$formArray ['contPhone'] = $this->input->post ('contPhone');
			$formArray ['clnAdd'] = $this->input->post ('clnAdd');
			$formArray ['orderDate'] = $this->input->post ('orderDate');
			$formArray ['clnRating'] = $this->input->post ('clnRating');
			$formArray ['clnStatus'] = $this->input->post ('clnStatus');
			$formArray ['clnremark'] = $this->input->post ('clnremark');
			$formArray ['clnnote'] = $this->input->post ('clnnote');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Client_model->updateClient($clnId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/client/index');
        }  
    }
    
	
	public function gm_edit($clnId){
        $this->load->model('Client_model');
        $client = $this->Client_model->getClient($clnId);
        $data = array();
        $data['client'] = $client;

        $this->form_validation->set_rules('clnId','Client ID');
        $this->form_validation->set_rules('clnName','Client Name','required');
		$this->form_validation->set_rules('clnMail','Client Email','required|valid_email');
		$this->form_validation->set_rules('consName','Consultant Name','required');
		$this->form_validation->set_rules('contName','Contact Person Name','required');
		$this->form_validation->set_rules('contPhone','Contact Person Number','required');
		$this->form_validation->set_rules('clnAdd','Address','required');
		$this->form_validation->set_rules('orderDate','First Order Date','required');
		$this->form_validation->set_rules('clnStatus','Satus','required');
	

        if ($this->form_validation->run() == false) {
            $this->load->view('gm/client/edit',$data);
        } else {
            // update client record
            $formArray = array();
            $formArray ['clnId'] = $this->input->post ('clnId');
            $formArray ['clnName'] = $this->input->post ('clnName');
			$formArray ['clnMail'] = $this->input->post ('clnMail');
			$formArray ['consName'] = $this->input->post ('consName');
			$formArray ['contName'] = $this->input->post ('contName');
			$formArray ['contPhone'] = $this->input->post ('contPhone');
			$formArray ['clnAdd'] = $this->input->post ('clnAdd');
			$formArray ['orderDate'] = $this->input->post ('orderDate');
			$formArray ['clnRating'] = $this->input->post ('clnRating');
			$formArray ['clnStatus'] = $this->input->post ('clnStatus');
			$formArray ['clnremark'] = $this->input->post ('clnremark');
			$formArray ['clnnote'] = $this->input->post ('clnnote');
			$formArray ['created_at'] = date (  'd-m-y H:i:s');
            $this->Client_model->updateClient($clnId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/client/gm_index');
        }  
    }

    public function delete($clnId) {
        $this->load->model('Client_model');
        $client = $this->Client_model->getClient($clnId);
		
        if (empty($client)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/client/index');
        }

        $this->Client_model->deleteClient($clnId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/client/index');
    }
    
	
	public function gm_delete($clnId) {
        $this->load->model('Client_model');
        $client = $this->Client_model->getClient($clnId);
        if (empty($client)) {
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/client/gm_index');
        }

        $this->Client_model->deleteClient($clnId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/client/gm_index');
    }

    public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model('Client_model');
		$this->load->helper('url');
	}
	
	public function register(){
		$clients = $this->Client_model->all();
		redirect(base_url().'index.php/client/index');
	}
	


	
	public function data(){
		$clients = $this->Client_model->all();
        if(count($clients)>0){
			
			
			
			
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1','Sl.No');
			$sheet->setCellValue('B1','CLIENT ID');
			$sheet->setCellValue('C1','NAME');
			$sheet->setCellValue('D1','EMAIL');
			$sheet->setCellValue('E1','CONSULTANT NAME');
			$sheet->setCellValue('F1','ADDRESS');
			$sheet->setCellValue('G1','CONTACT PERSON NAME');
			$sheet->setCellValue('H1','CONTACT NUMBER');
			$sheet->setCellValue('I1','FIRST ORDER DATE');
			$sheet->setCellValue('J1','RATING');
			$sheet->setCellValue('K1','STATUS');
			$sheet->setCellValue('L1','NOTES');
			$sheet->setCellValue('M1','REMARKS');
                $row =2;
                $coun=0;
                foreach($clients as $client){
					$coun++;
					
					$sheet->setCellValue('A'.$row,$coun);
					$sheet->setCellValue('B'.$row,$client['clnId']);
					$sheet->setCellValue('C'.$row,$client['clnName']);
					$sheet->setCellValue('D'.$row,$client['clnMail']);
					$sheet->setCellValue('E'.$row,$client['consName']);
					$sheet->setCellValue('F'.$row,$client['clnAdd']);
					$sheet->setCellValue('G'.$row,$client['contName']);
					$sheet->setCellValue('H'.$row,$client['contPhone']);
					$sheet->setCellValue('I'.$row,$client['orderDate']);
					$sheet->setCellValue('J'.$row,$client['clnRating']);
					$sheet->setCellValue('K'.$row,$client['clnStatus']);
					$sheet->setCellValue('L'.$row,$client['clnremark']);
					$sheet->setCellValue('M'.$row,$client['clnnote']);
                    $row++;
                }
                $writer = new Xlsx($spreadsheet);
                    $filename = 'client_data';
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
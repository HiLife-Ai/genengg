<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Emp_dashboard extends CI_Controller{
    
    public function index() {
        $this->load->model('Admin_model');
        $xa=0;
        $xaa=0;
        $xaaa=0;
        $projects= $this->Admin_model->countTotalProj();
				foreach ($projects as  $value) {
					$x=explode(",",$value['proMem']);
					if(in_array($_COOKIE['empId'],$x)){
						$xa=$xa+1;
					}
				}



        $task = $this->Admin_model->getallproject();
		foreach ($task as  $value) {
					$x=explode(",",$value['taskMem']);
					$status=explode(",",$value['taskMemStatus']);
					if(in_array($_COOKIE['empId'],$x)){
                        $key=array_search($_COOKIE['empId'],$x);
                        if($status[$key] == "Pending" || $status[$key] == "Progress" ){
                            $xaa=$xaa+1;
                            
                        }else if($status[$key] == "Complete"){

                            $xaaa=$xaaa+1;
                        }
                        
					}
				}
			
        $data['countTotalProjects'] = $xa;

        


        $data['countPendingTasks'] = $xaa;
        $data['countCompleteTasks'] = $xaaa;

        // print_r($data);
        $this->load->view('emp/dashboard',$data);
    }

}
?>
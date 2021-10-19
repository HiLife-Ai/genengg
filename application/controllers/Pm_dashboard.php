<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pm_dashboard extends CI_Controller{
    
    public function index() {
        
        $this->load->model('Admin_model');
        $data['countTotalEmployees'] = $this->Admin_model->countTotalEmployees();
        $data['countTotalClients'] = $this->Admin_model->countTotalClients();
        $data['countTotalProjects'] = $this->Admin_model->countTotalProjects();
        $data['countPendingProjects'] = $this->Admin_model->countPendingProjects();
        
        
$pendingtask=0;
$completetask=0;

        $task = $this->Admin_model->countTotaltask();
    
		foreach ($task as  $value) {
					$status=explode(",",$value['taskMemStatus']);

					if(in_array("Pending",$status) || in_array("Progress",$status) ){
                        
                        $pendingtask=$pendingtask+1;
 
					}else{
                        $completetask=$completetask+1;
                        
                    }
				}

        $data['countPendingTasks'] = $pendingtask;
        $data['countCompleteTasks'] = $completetask;
        
      

        $this->load->view('pm/dashboard',$data);
    }

}
?>
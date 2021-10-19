<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Hm_dashboard extends CI_Controller{
    
    public function index() {
        $this->load->model('Admin_model');
        $data['countTotalEmployees'] = $this->Admin_model->countTotalEmployees();
        $data['countTotalClients'] = $this->Admin_model->countTotalClients();
        $data['countTotalProjects'] = $this->Admin_model->countTotalProjects();
        //$data['countTotalTasks'] = $this->Admin_model->countTotalTasks();


        
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
        
        $this->load->view('hm/dashboard',$data);
    }

}
?>
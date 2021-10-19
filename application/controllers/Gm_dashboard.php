<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Gm_dashboard extends CI_Controller{
    
    public function index() {

        
        $this->load->model('Admin_model');
        $data['countTotalEmployees'] = $this->Admin_model->countTotalEmployees();
        $data['countTotalClients'] = $this->Admin_model->countTotalClients();
        $data['countTotalProjects'] = $this->Admin_model->countTotalProjects();
        $data['countPendingTasks'] = $this->Admin_model->countPendingTasks();
        $data['countCompleteTasks'] = $this->Admin_model->countCompleteTasks();
        $this->load->view('gm/dashboard',$data);
    }

}
?>
<?php

class Admin_model extends CI_model {
    
    public function countTotalEmployees()
    {
        
        $this->db->select('*');
        $this->db->from('employee');
        return $this->db->count_all_results();
    }
    
    public function countTotalClients()
    {
        $this->db->select('*');
        $this->db->from('client');
        return $this->db->count_all_results();
    }
    
    public function countTotalProj()
    {
        $this->db->select('proMem,proId');
        $projects = $this->db->get('project')->result_array(); // SELECT * from project where id
        return $projects;
    }
    
    public function countTotaltask()
    {
        $this->db->select('taskMemStatus,taskMem,taskId');
        $projects = $this->db->get('task')->result_array(); // SELECT * from project where id
        return $projects;
    }
    
    
    public function countTotalProjects()
    {
        $this->db->select('*');
        $this->db->from('project');
        return $this->db->count_all_results();
    }

    public function gettaskByUser($empId) {
        $this->db->where('taskId',$empId);

        $projects = $this->db->get('task')->row(); // SELECT * from project where id
        return $projects;
    }

    public function getProjectByUser($empId) {
        $this->db->where('proId',$empId);

        $projects = $this->db->get('project')->row(); // SELECT * from project where id
        return $projects;
    }
    public function getallproject() {
       
        $this->db->select('taskMem,taskId,taskMemStatus');
        $projects = $this->db->get('task')->result_array(); // SELECT * from project where id
        return $projects;
   
    }
    public function countPendingTasks()
    {
        
        $this->db->select('task_users.*');
        $this->db->where('task_users.emp_id',$_COOKIE['empId']);
        $this->db->where('t1.taskStatus','Incomplete');
        
        $this->db->join('task as t1','t1.taskId = task_users.task_id');
        
        return count($this->db->get('task_users')->result_array());
        
        
        
        
    }
    public function countCompleteTasks()
    {
        $this->db->select('task_users.*');
        $this->db->where('task_users.emp_id',$_COOKIE['empId']);
        $this->db->where('t1.taskStatus','Completed');

        $this->db->join('task as t1','t1.taskId = task_users.task_id');

        return count($this->db->get('task_users')->result_array());

    }

    public function countPendingProjects()
    {

        $this->db->select('*');
        $this->db->where('proStatus !=','Finished');
        $this->db->from('project');
        return $this->db->count_all_results();
    }

    public function countcompleteProjects()
    {
        $this->db->get('project');
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('proStatus','Finished');
        return $this->db->count_all_results();
    }

    public function countTotalTasks()
    {
        if (isset($_COOKIE['empId'])) {
			if ($_COOKIE['empRole'] == 'Admin') {
                $this->db->get('task_users');
                $this->db->select('*');
                $this->db->from('task_users');
                return $this->db->count_all_results();
            } else {
                $this->db->get('task_users');
                $this->db->select('*');
                $this->db->from('task_users')->where('emp_id', $_COOKIE['empId']);
                return $this->db->count_all_results();
            }
        }
    }



}
?>
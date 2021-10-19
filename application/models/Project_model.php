<?php

    class Project_model extends CI_model{

        function __construct()
        {
            parent::__construct();
        }

        public function getEmployee(){
            $this->db->where('empRole','Employee');
            $query = $this->db->get('employee');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        public function getClient(){
            $query = $this->db->get('client');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        public function create($formArray) {
            $this->db->insert('project',$formArray); // INSERT INTO projects values;
        }
        
        
        public function create_time($formArray) {
            $this->db->insert('project_time',$formArray); // INSERT INTO projects values;
        }

        public function all() {
             $this->db->select('*,t1.clnName as client');
            $this->db->join('client as t1','t1.clnId=project.client');
            return $projects = $this->db->get('project')->result_array(); 
        }

        public function getProject($projectId) {
            $this->db->where('proId',$projectId);
            return $project = $this->db->get('project')->row_array(); // SELECT * from project where id
        }

        public function getallproject() {
            $this->db->select('proMem,proId');
            $projects = $this->db->get('project')->result_array(); // SELECT * from project where id
            return $projects;
        }
        public function getProjectByUser($empId) {
            
            $this->db->select('*,t1.clnName as client');
            $this->db->where('proId',$empId);
            $this->db->join('client as t1','t1.clnId=project.client');
            $projects = $this->db->get('project')->row(); // SELECT * from project where id
            return $projects;
        }

        public function assign_id() {

            $this->db->select('proId'); 
            $this->db->order_by('proId','desc'); 
            return $clients = $this->db->get('project')->row(); 
        }


        
        
        public function getallemployee() {
            
            $this->db->select('empName,empId');
            $this->db->where('empRole','Employee');
            return $employees = $this->db->get('employee')->result_array();
       
        }
        
        public function getallclient() {
            
            $this->db->select('clnId,clnName');
            return $employees = $this->db->get('client')->result_array();
       
        }

        public function updateProject($projectId,$formArray){
            $this->db->where('proId',$projectId);
            $this->db->update('project',$formArray); // UPDATE project set values where id
        }
        
        public function updateProject_time($projectId,$formArray){
            $this->db->where('project_id',$projectId);
            $this->db->update('project_time',$formArray); // UPDATE project set values where id
        }

        public function deleteProject($projectId) {
            $this->db->where('proId',$projectId);
            $this->db->delete('project'); // DELETE from project where id
        }

    }

?>
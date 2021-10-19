<?php

    class Task_model extends CI_model{

        public function getEmployee(){
            $this->db->where('empRole','Employee');
            $query = $this->db->get('employee');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        public function getProject(){
            $query = $this->db->get('project');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        public function create($formArray) {
            $this->db->insert('task',$formArray); // INSERT INTO tasks values;
        }

        public function all() {
            return $tasks = $this->db->get('task')->result_array(); // SELECT * from task
        }
        
        public function all_taa() {
            $this->db->select('*,t1.proName as projectName');
            $this->db->join('project as t1','t1.proId=task.projectName');
            return $tasks = $this->db->get('task')->result_array(); // SELECT * from task
        }

        public function getTask($taskId) {
            $this->db->where('taskId',$taskId);
            return $task = $this->db->get('task')->row_array(); // SELECT * from task where taskId
        }

        public function getalltask() {
       
            $this->db->select('taskMem,taskId');
            $projects = $this->db->get('task')->result_array(); // SELECT * from project where id
            return $projects;
       
        }
        
        public function getallproject() {
       
            $this->db->select('*,t1.clnName as client');
            $this->db->join('client as t1','t1.clnId=project.client');
            $projects = $this->db->get('project')->result_array(); // SELECT * from project where id
            return $projects;
            
        }
        
        public function getallemployee() {
            
            $this->db->select('empName,empId');
            $this->db->where('empRole','Employee');
            return $employees = $this->db->get('employee')->result_array();
       
        }

        public function assign_id() {

            $this->db->select('taskId'); 
            $this->db->order_by('taskId','desc'); 
            return $clients = $this->db->get('task')->row(); 
        }
      
        public function get_Task_time($id) {

            $this->db->select('*'); 
            $this->db->where('task_id',$id);
            $this->db->order_by('task_id','desc'); 
            return $clients = $this->db->get('task_time')->result_array(); 
        }


        public function getProjectByUser($empId) {
            $this->db->select('*,t1.proName as projectName');
            $this->db->where('taskId',$empId);
            $this->db->join('project as t1','t1.proId=task.projectName');
            

            $projects = $this->db->get('task')->row(); // SELECT * from project where id
            return $projects;
        }


        public function getTaskByUser($empId) {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "gen";
            $conn = mysqli_connect($hostname, $username, $password, $database);

            $query = "select * from task Join task_users ON task.taskId = task_users.task_id where task_users.emp_id = '" . $empId . "'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $row; // SELECT * from task where taskId
        }

        public function updateTask($taskId,$formArray){
            $this->db->where('taskId',$taskId);
            $this->db->update('task',$formArray); // UPDATE task set values where taskId
        }

        public function updateProject_time($projectId,$formArray){
            $this->db->where('task_id',$projectId);
            $this->db->update('task_time',$formArray); // UPDATE project set values where id
        }
        
        public function create_time($formArray) {
            $this->db->insert('task_time',$formArray); // INSERT INTO projects values;
        }

        public function deleteTask($taskId) {
            $this->db->where('taskId',$taskId);
            $this->db->delete('task'); // DELETE from task where taskId
        }
    }

?>
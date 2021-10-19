<?php

    class Assign_model extends CI_model{

        public function getEmployee(){
            $this->db->where('empRole','Employee');
            $query = $this->db->get('employee');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        public function getTask(){
            $query = $this->db->get('task');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        
        public function assign_id() {

            $this->db->select('taskId'); 
            $this->db->order_by('taskId','desc'); 
            return $clients = $this->db->get('task')->row(); 
        }

        public function create($formArray) {
            $this->db->insert('task_users',$formArray); // INSERT INTO clients values;
        }

        public function all() {
            return $assigned = $this->db->get('task_users')->result_array(); // SELECT * from client
        }

        public function getAllTask($Id) {
            $this->db->where('id',$Id);
            return $assign = $this->db->get('task_users')->row_array(); // SELECT * from task where Id
        }

        public function updateTask($Id,$formArray){
            $this->db->where('id',$Id);
            $this->db->update('task_users',$formArray); // UPDATE task set values where Id
        }

        public function deleteTask($Id) {
            $this->db->where('id',$Id);
            $this->db->delete('task_users'); // DELETE from client where Id
        }
    }

?>
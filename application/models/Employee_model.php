<?php

    class Employee_model extends CI_model {

        public function getGender(){
            $query = $this->db->get('gender');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        public function getRole(){
            $query = $this->db->get('role');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        public function assign_id() {

            $this->db->select('empId'); 
            $this->db->order_by('empId','desc'); 
            return $clients = $this->db->get('employee')->row(); 
        }
        

        public function create($formArray) {
            $this->db->insert('employee',$formArray); // INSERT INTO employees values;
            $this->db->select("UPDATE employee SET CONCAT((empstr),(' '),(id)) AS empId");
            // $this->db->select('*'); 
            // $this->db->from('employee');
            // // $this->db->update('employee SET CONCAT(empstr,"",id) AS empId;');
            // $this->db->update('employee SET empId = CONCAT( empstr,"",id );');
            // $query = $this->db->get();
            // return $query->result();
        }

        public function all() {

            return $employees = $this->db->get('employee')->result_array();
        }

        public function getEmployee($empId) {
            $this->db->where('empId',$empId);
            return $employee = $this->db->get('employee')->row_array(); // SELECT * from employee where empId
        }

        public function updateEmployee($empId,$formArray){
            $this->db->where('empId',$empId);
            $this->db->update('employee',$formArray); // UPDATE employee set values where empId
        }

        public function deleteEmployee($empId) {
            $this->db->where('empId',$empId);
            $this->db->delete('employee'); // DELETE from employee where empId
        }

        
    }

?>
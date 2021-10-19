<?php

    class Designation_model extends CI_model {

        public function create($formArray) {
            $this->db->insert('role',$formArray); // INSERT INTO roles values;
        }

        public function all() {
            return $roles = $this->db->get('role')->result_array(); // SELECT * from role
        }

        public function getDesignation($roleId) {
            $this->db->where('id',$roleId);
            return $role = $this->db->get('role')->row_array(); // SELECT * from role where id
        }

        public function updateDesignation($roleId,$formArray){
            $this->db->where('id',$roleId);
            $this->db->update('role',$formArray); // UPDATE role set values where id
        }

        public function deleteDesignation($roleId) {
            $this->db->where('id',$roleId);
            $this->db->delete('role'); // DELETE from role where id
        }

        public function assign_id() {

            $this->db->select('id'); 
            $this->db->order_by('id','desc'); 
            return $clients = $this->db->get('role')->row(); 
        }

        
    }

?>
<?php

    class Client_model extends CI_model{

        public function create($formArray) {
            $this->db->insert('client',$formArray); // INSERT INTO clients values;
        }

        public function all() {
            return $clients = $this->db->get('client')->result_array(); 
        }
        
        
        public function client_id() {

            $this->db->select('clnId'); 
            $this->db->order_by('clnId','desc'); 
            return $clients = $this->db->get('client')->row(); 
        }

        public function getClient($clnId) {
            $this->db->where('clnId',$clnId);
            return $client = $this->db->get('client')->row_array(); // SELECT * from client where clnId
        }

        public function updateClient($clnId,$formArray){
            $this->db->where('clnId',$clnId);
            $this->db->update('client',$formArray); // UPDATE client set values where clnId
        }

        public function deleteClient($clnId) {
            $this->db->where('clnId',$clnId);
            $this->db->delete('client'); // DELETE from client where clnId
        }
    }

?>
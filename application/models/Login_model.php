<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login_model extends CI_Model {

	function check_user($email, $password) {
		$this->db->select('*'); //select all
		$this->db->from('employee'); //table name
		$this->db->where('empMail', $email); // where username is equal to email
		$this->db->where('empPwd', $password);  // and password is equal to password
		$query = $this->db->get(); //get data from DB
		return $query;
	}

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	function auth() {
		$email = $this->input->post('empMail', TRUE);
		$password =$this->input->post('empPwd', TRUE);

		$result = $this->Login_model->check_user($email, $password);
		
		if ($result->num_rows() > 0) {
			$data = $result->row_array();
			$email = $data['empMail'];
			$name = $data['empName'];
			$role = $data['empRole'];
			$empID = $data['empId'];
			$sesdata = array(
				'empMail' => $email,
				'empName' => $name,
				'empRole' => $role,
				'empId' => $empID,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			setcookie("Auction_Item", "Luxury Car", time()+2*24*60*60);
			
			$_SESSION['empName'] = $name;
			if ($role === 'General Manager') {
				redirect('Admin');
			} elseif($role === 'HR Manager') {
				redirect('Hm_dashboard');
			} elseif($role === 'Project Manager') {
				redirect('Pm_dashboard');
			} elseif($role === 'Employee') {
				redirect('Emp_dashboard');
			} else {
				redirect('Login');
			}
		} else {
			echo "<script>alert('access denied');history.go(-1);</script>";
		}
		$this->load->view('login_view');
	}

	function logout() {
		$this->session->sess_destroy();
		
		redirect('Login');
	}

}
?>
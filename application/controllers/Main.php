<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Model_user');
	    $this->load->model('Model_grievance');
	}

	public function login() {
		$this->load->view('login');
	}

	public function login_request() {
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$pass2 = md5($pass);

		if($result = $this->Model_user->query("SELECT * FROM user_info WHERE username='$user' AND password='$pass2'")->result()) {

		  foreach ($result as $key => $value) {
		    if ($value) {
		      $data = [
		              'user_id' => $value->user_id,
		              'level_id' => $value->level_id,
		              'fullname' 	=> $value->fullname
		      ];
		      $this->session->set_userdata($data);
        	  $this->session->set_flashdata('welcome', 'True');
		      $this->Model_user->update(['is_status' => '1'], ['user_id' => $this->session->user_id]);
		      redirect(base_url('main'));
		    } else {
		      echo 'error';
		    }
		  }
		} else {
		  $this->session->set_flashdata('data_name', 'Incorrect Employee Username or Password!');
		  redirect(base_url().'?login_attempt='.md5(0));
		}
	}

	public function request_logout() {
		$this->Model_user->update(["is_status" => "0"], ["user_id" => $this->session->user_id]);
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function index()	{
		$id = $this->session->userdata('user_id');
		if($this->session->userdata('user_id')){
			$data['load'] = '<script>page("dashboard_data");</script>';
			$data['data'] = $this->Model_user->query("SELECT fullname, location, avatar FROM user_info WHERE user_id = '$id'")->row();
      		$this->load->view('pages/main', $data);
	    } else {
	      	$this->load->view('login');
	    }
	}

	public function dashboard_data() {
		$id = $this->session->userdata('user_id');
		$result['user'] = $this->Model_user->query("SELECT fullname, location, avatar FROM user_info WHERE user_id = '$id'")->row();
    	$result['grievance'] = $this->Model_grievance->query("SELECT count(*) as 'countAll', DATE_FORMAT(NOW(), '%M %d, %Y %h:%i %p') AS 'DateNow' FROM grievance WHERE YEAR(g_date_intake) = YEAR(NOW()) AND g_status IN ('Ongoing')")->row();

		if ($this->session->userdata('user_id')) {
			return $this->load->view('pages/dashboard', $result);
		} else {
			redirect(base_url());
		}
	}

	public function add_grievance_data() {
		$sessionID = $this->session->userdata('user_id');
		$result['user_data'] = $this->Model_user->query("SELECT location FROM user_info WHERE user_id = '$sessionID'")->row();
		$result['res'] = $this->Model_user->query("SELECT * FROM category")->result();
		$result['res1'] = $this->Model_user->query("SELECT * FROM report_modes")->result();
		
		if ($this->session->userdata('user_id')) {
			return $this->load->view('pages/add_grievance', $result);
		} else {
			redirect(base_url());
		}
	}

	public function view_grievance_data() {
		$result['year'] = $this->Model_grievance->query("SELECT DATE_FORMAT(g_date_intake, '%Y') as years FROM grievance GROUP BY years DESC")->result();
		
		if ($this->session->userdata('user_id')) {
			return $this->load->view('pages/view_grievance', $result);
		} else {
			redirect(base_url());
		}
	}

	public function profile_data() {
		$id = $this->session->userdata('user_id');
		$result['user'] = $this->Model_user->query("SELECT fullname, location, avatar FROM user_info WHERE user_id = '$id'")->row();
		$result['year'] = $this->Model_grievance->query("SELECT YEAR(g_date_intake) as years FROM grievance GROUP BY years")->result();
		
		if ($this->session->userdata('user_id')) {
			return $this->load->view('pages/profile', $result);
		} else {
			redirect(base_url());
		}
	}

	public function dashboard() {
		if($this->session->userdata('user_id')){
			$id = $this->session->userdata('user_id');
      		$data['data'] = $this->Model_user->query("SELECT * FROM user_info WHERE user_id = '$id'")->row();
			$data['load'] = '<script>page("dashboard_data");</script>';

      		$this->load->view('pages/main', $data);
	    } else {
	      	$this->load->view('login');
	    }
	}

	public function add_grievance() {
		if($this->session->userdata('user_id')){
			$id = $this->session->userdata('user_id');
      		$data['data'] = $this->Model_user->query("SELECT * FROM user_info WHERE user_id = '$id'")->row();
			$data['load'] = '<script>page("add_grievance_data");</script>';
      		$this->load->view('pages/main', $data);
	    } else {
	      	$this->load->view('login');
	    }
	}

	public function view_grievance() {
		if($this->session->userdata('user_id')){
			$id = $this->session->userdata('user_id');
      		$data['data'] = $this->Model_user->query("SELECT * FROM user_info WHERE user_id = '$id'")->row();
			$data['load'] = '<script>page("view_grievance_data");</script>';
      		$this->load->view('pages/main', $data);
	    } else {
	      	$this->load->view('login');
	    }		
	}

	public function user_profile() {
		if($this->session->userdata('user_id')){
			$id = $this->session->userdata('user_id');
      		$data['data'] = $this->Model_user->query("SELECT * FROM user_info WHERE user_id = '$id'")->row();
			$data['load'] = '<script>page("profile_data");</script>';
      		$this->load->view('pages/main', $data);
	    } else {
	      	$this->load->view('login');
	    }	
	}


}

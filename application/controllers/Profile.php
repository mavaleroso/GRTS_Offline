<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Model_user');
	    $this->load->model('Model_grievance');
		$this->load->database("default");
	}

	public function do_upload() {
	    $config['upload_path']="./assets/user-img";
	    $config['allowed_types']='gif|jpg|png';
	    $config['encrypt_name'] = TRUE;
	    $id = $this->session->userdata('user_id');
	    
	    $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        // $data = array('upload_data' => $this->upload->data());
	        $data = $this->upload->data();
	        //Resize and Compress Image
	        $config['image_library']='gd2';
	        $config['source_image']='./assets/user-img/'.$data['file_name'];
	        $config['create_thumb']= FALSE;
	        $config['maintain_ratio']= FALSE;
	        $config['quality']= '60%';
	        $config['width']= 600;
	        $config['height']= 600;
	        $config['new_image']= './assets/user-img/'.$data['file_name'];
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

	        $image= $data['file_name']; 

	        $where = array(
	            'user_id' => $id
	        );

	        $data = array(
	            'avatar' => $image 
	        );

	        $result= $this->Model_user->update($data, $where);
	        echo json_decode($result);
	    }
	}

	public function delete_img() {
	    $img = $this->input->get('img');
	    $path = 'assets/user-img/'. $img;
	    unlink($path);
	}

	public function update_info() {
		$id = $this->session->userdata('user_id');
		$fullname = $this->input->post('fullname');
		$data = array('fullname' => $fullname, );
		$where = array('user_id' => $id, );
		$this->Model_user->update($data, $where);
	}

	public function update_location() {
		$id = $this->session->userdata('user_id');

		$brgy = $this->input->post('brgy');
		$city = $this->input->post('city');
		$prov = $this->input->post('prov');
		$reg = $this->input->post('reg');

		if ($brgy == NULL) {
			 $location = $city . ', ' . $prov . ', ' . $reg;
		} else {
			 $location = $brgy . ', ' . $city . ', ' . $prov . ', ' . $reg;
		}

		$data = array(
			'location' => $location, 
		);
		$where = array('user_id' => $id, );
		$this->Model_user->update($data, $where);
	}

	public function match_password() {
		$id = $this->session->userdata('user_id');

		$matchPass = $this->input->get('match');
		$matchPass = md5($matchPass);

		$result = $this->Model_user->query("SELECT COUNT(*) as countAll FROM user_info WHERE password = '$matchPass' AND user_id = '$id'")->row();
		echo $result->countAll;
	}

	public function update_password() {
		$id = $this->session->userdata('user_id');
		$newPass = $this->input->post('newPass');
		$newPass = md5($newPass);
		$data = array('password' => $newPass);
		$where = array('user_id' => $id);
		$this->Model_user->update($data, $where);
	}

	public function delete_grievance() {
		$fromMonth = $this->input->get('fromMonth');
		$toMonth = $this->input->get('toMonth');
		$year = $this->input->get('year');

		$whereMonth = array();
	    $whereYear = array();

	    if ($fromMonth != 0 && $toMonth != 0) {
	    	foreach (range($fromMonth, $toMonth) as $number) {
	    		array_push($whereMonth,$number);
			}
	    }

	    if ($whereMonth != NULL && $year == NULL) {
	    	for ($i=0; $i <= sizeof($whereMonth); $i++) { 
				$this->Model_grievance->query("DELETE FROM grievance WHERE MONTH(g_date_intake) = '$whereMonth[$i]'");
			}
	    } else if ($whereMonth == NULL && $year != NULL) {
			$this->Model_grievance->query("DELETE FROM grievance WHERE YEAR(g_date_intake) = '$year'");
	    } else if ($whereMonth != NULL && $year != NULL) {
	    	for ($i=0; $i <= sizeof($whereMonth); $i++) { 
				$this->Model_grievance->query("DELETE FROM grievance WHERE MONTH(g_date_intake) = '$whereMonth[$i]' AND YEAR(g_date_intake) = '$year'");
			}
	    }
						

	}

}


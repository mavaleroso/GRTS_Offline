<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Model_grievance');
	}


	public function fetch_provinces() {
		$result = $this->Model_grievance->query("SELECT g_province as provName, Count(g_province) as countAll, Sum(g_status = 'Ongoing') as 'countOngoing', Sum(g_status = 'Resolved') as 'countResolved' FROM grievance WHERE YEAR(g_date_intake) = YEAR(NOW()) AND g_status IN ('Ongoing', 'Resolved') GROUP BY g_province")->result();
	
		echo json_encode($result);
	  }
	
	public function fetch_categories() {
		$result = $this->Model_grievance->query("SELECT category_name as catName, Count(g_category) as 'countAll', Sum(g_status = 'Ongoing') as 'countOngoing', Sum(g_status = 'Resolved') as 'countResolved' FROM grievance LEFT JOIN category on grievance.g_category = category.category_id WHERE YEAR(grievance.g_date_intake) = YEAR(NOW()) AND g_status IN ('Ongoing', 'Resolved') GROUP BY grievance.g_category")->result();

		echo json_encode($result);
	}
}


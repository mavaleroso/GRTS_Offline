<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grievance extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Model_grievance');
	    $this->load->model('Model_root');
	    $this->load->model('Model_datatable');
	}


	public function get_date_now()
	{
		$result = $this->Model_grievance->query('SELECT DATE_FORMAT(now(), "%M %d, %Y") as "dateNow" FROM user_info')->row();	
		echo json_encode($result);
	}

	public function search_beneficiary() {
		$search = $this->input->get('query');
		$typeGrant = strtolower($this->input->get('typeGrant'));
		$result = $this->Model_grievance->query("SELECT * FROM grantee_list WHERE CONCAT(grant_firstname, grant_middlename, grant_lastname, grant_hh_id) LIKE '%$search%' AND grant_member = '$typeGrant' LIMIT 3")->result();
		echo json_encode($result);
	}

	
	public function search_brgy() {
		$search = $this->input->get('search');
		$result = $this->Model_grievance->query("SELECT lib_brgy.BRGY_ID, BRGY_NAME FROM lib_regions LEFT JOIN lib_provinces on lib_provinces.REGION_ID = lib_regions.REGION_ID LEFT JOIN lib_cities on lib_cities.PROVINCE_ID = lib_provinces.PROVINCE_ID LEFT JOIN lib_brgy on lib_brgy.CITY_ID = lib_cities.CITY_ID WHERE lib_regions.REGION_ID = 16	 AND lib_brgy.BRGY_NAME LIKE '%$search%' LIMIT 10")->result();
		echo json_encode($result);
	}
  
	public function search_mun_city() {
		$search = $this->input->get('search');
		$result = $this->Model_grievance->query("SELECT lib_cities.CITY_ID, CITY_NAME FROM lib_regions LEFT JOIN lib_provinces on lib_provinces.REGION_ID = lib_regions.REGION_ID LEFT JOIN lib_cities on lib_cities.PROVINCE_ID = lib_provinces.PROVINCE_ID WHERE lib_regions.REGION_ID = 16 AND lib_cities.CITY_NAME LIKE '%$search%' LIMIT 10")->result();
		echo json_encode($result);
	}
  
	public function search_provinces() {
		$search = $this->input->get('search');
		$result = $this->Model_grievance->query("SELECT lib_provinces.PROVINCE_ID, PROVINCE_NAME FROM lib_regions LEFT JOIN lib_provinces on lib_provinces.REGION_ID = lib_regions.REGION_ID WHERE lib_regions.REGION_ID = 16 AND lib_provinces.PROVINCE_NAME LIKE '%$search%' LIMIT 10")->result();
		echo json_encode($result);
	}
  
	public function search_regions() {
		$search = $this->input->get('search');
		$result = $this->Model_grievance->query("SELECT REGION_ID, REGION_NAME FROM lib_regions WHERE lib_regions.REGION_ID = 16 AND REGION_NAME LIKE '%$search%' LIMIT 10")->result();
		echo json_encode($result);
	}

	public function sub_category() {
		$category_id = $this->input->get('cat_id');
		$result = $this->Model_grievance->query("SELECT * FROM sub_category WHERE category_id = '$category_id'")->result();
		echo json_encode($result);
	}

	public function add_grievance() {
		$p1 = $this->input->post('p1');
		$p2 = $this->input->post('p2');
		$p3 = $this->input->post('p3');
		$p4 = $this->input->post('p4');
		$p5 = $this->input->post('p5');
		$p6 = $this->input->post('p6');
		$rca = $this->input->post('rca');

		$fullname = $this->input->post('fname') . ' ' . $mname = $this->input->post('mname') . ' ' . $lname = $this->input->post('lname');
	    $category = $this->input->post('category');
	    $subCategory = $this->input->post('sub_category');
	    $dIntake = date('Y', strtotime($this->input->post('date_filed')));

		$state = 0;

		if ($this->Model_grievance->query("SELECT * FROM grievance WHERE g_fullname = '$fullname' AND g_category = '$category' AND g_sub_category = '$subCategory' AND g_status = 'Ongoing' AND g_date_intake LIKE '%$dIntake%'")->row()) {
			$state = 1;
		} else {
			$randomNum = substr(str_shuffle("0123456789"), 0, 5);
			$date = $this->get_datetime();
			$tracking_no = date('Y-m-d', strtotime($date)) . '-' . $randomNum;
			$date_now = date('Y-m-d', strtotime($date));
			$data = array(
				'g_tracking_no' => $tracking_no,
				'g_beneficiary_id' => $this->input->post('ben_id'),
				'g_membership' => $this->input->post('member'),
				'g_fullname' => $fullname,
				'g_purok' => $this->input->post('purok'),
				'g_barangay' => $this->input->post('brgy'),
				'g_city_muncipality' => $this->input->post('mun_city'),
				'g_province' => $this->input->post('province'),
				'g_region' => $this->input->post('region'),
				'g_sex' => $this->input->post('sex'),
				'g_hh_id' => $this->input->post('household_id'),
				'g_hh_set' => $this->input->post('hh_set'),
				'g_contact' => $this->input->post('contact'),
				'g_ip_affiliation' => $this->input->post('ip'),
				'g_category' => $category,
				'g_sub_category' => $subCategory,
				'g_description' => $this->input->post('comp_des'),
				'g_resolution' => $this->input->post('in_reso'),
				'g_assist_by' => $this->input->post('assist_by'),
				'g_date_encode' => $date_now,
				'g_date_intake' => date('Y-m-d', strtotime($this->input->post('date_filed'))),
				'g_status' => 'Ongoing',
				'g_mode' => $this->input->post('r_mode'),
				'g_gbv_age' => $this->input->post('rcaAge'),
				'g_gbv_sex' => $this->input->post('rcaSex'),
				'g_subj_complaint' => $this->input->post('subject'),
				'g_location' => $this->input->post('location')
			);

			if ($p1 != NULL) {
				$data['g_p1'] = $p1;
			}

			if ($p2 != NULL) {
				$data['g_p2'] = $p2;
			}

			if ($p3 != NULL) {
				$data['g_p3'] = $p3;
			}

			if ($p4 != NULL) {
				$data['g_p4'] = $p4;
			}

			if ($p5 != NULL) {
				$data['g_p5'] = $p5;
			}

			if ($p6 != NULL) {
				$data['g_p6'] = $p6;
			}

			if ($rca != NULL) {
				$data['g_rca'] = $rca;
			}

			$this->Model_grievance->insert($data);
		}

		echo $state;
		
	}

	public function get_datetime() {
		$result = $this->Model_grievance->query("SELECT DATE_FORMAT(NOW(), '%M %d, %Y') AS 'Result'")->result();
		echo json_encode($result);
		foreach ($result as $key => $value) {
			return $value->Result;
		}
	}

	public function fetch_grievance_table() {
	  	$startMonth = $this->input->post('fMonth');
	  	$endMonth = $this->input->post('tMonth');
	  	$onYear = $this->input->post('year');

	    $table = 'grievance AS g';
	    $select = "*, concat(a.root_code, ': ', a.root_description) as aRoot, concat(b.root_code, ': ', b.root_description) as bRoot, concat(c.root_code, ': ', c.root_description) as cRoot, concat(d.root_code, ': ', d.root_description) as dRoot, concat(e.root_code, ': ', e.root_description) as eRoot, concat(f.root_code, ': ', f.root_description) as fRoot, concat(h.root_code, ': ', h.root_description) as rcaRoot, date_format(g.g_date_intake, '%m-%d-%Y') as dateI, date_format(g.g_date_encode, '%m-%d-%Y') as dateE, a.root_id as aID, b.root_id as bID, c.root_id as cID, d.root_id as dID, e.root_id as eID, f.root_id as fID, h.root_id as rcaID";
	    $joinTbl1 = 'category';
	    $joinArgs1 = 'category.category_id = g.g_category';
	    $joinTbl2 = 'sub_category';
	    $joinArgs2 = 'sub_category.sub_category_id = g.g_sub_category';
	    $joinTbl3 = 'root_cause as a';
	    $joinArgs3 = 'a.root_id = g.g_p1';
	    $joinTbl4 = 'root_cause as b';
	    $joinArgs4 = 'b.root_id = g.g_p2';
	    $joinTbl5 = 'root_cause as c';
	    $joinArgs5 = 'c.root_id = g.g_p3';
	    $joinTbl6 = 'root_cause as d';
	    $joinArgs6 = 'd.root_id = g.g_p4';
	    $joinTbl7 = 'root_cause as e';
	    $joinArgs7 = 'e.root_id = g.g_p5';
	    $joinTbl8 = 'root_cause as f';
	    $joinArgs8 = 'f.root_id = g.g_p6';
	    $joinTbl9 = 'root_cause as h';
	    $joinArgs9 = 'h.root_id = g.g_rca';
	    $whereInCol = NULL;
    	$whereInArgs = NULL;
      	$whereArgs = array('g_status' => 'Ongoing');
        $whereLike = NULL;
	    $groupBy = NULL;
	    $column1 = 'g_date_intake';
	    $havingArgs = NULL;
	    $whereMonth = array();
	    $whereYear = array();

	    if ($startMonth != 0 && $endMonth != 0) {
	    	foreach (range($startMonth, $endMonth) as $number) {
	    		array_push($whereMonth,$number);
			}
	    }

	    if ($onYear != 0) {
	    	array_push($whereYear, $onYear);
	    }

	    $column_order = array('g_id', 'g_beneficiary_id', 'g_membership', 'g_tracking_no', 'g_fullname', 'g_sex', 'g_hh_id', 'g_hh_set', 'g_purok', 'g_barangay', 'g_city_muncipality', 'g_province', 'g_region', 'g_contact', 'category_name', NULL, 'sub_category_name', NULL, 'g_description', 'g_resolution', 'g_location', 'g_assist_by', 'g_date_encode', 'g_date_intake', 'g_subj_complaint', 'root_code', NULL, 'g_gbv_sex', 'g_gbv_age', 'g_mode'); 

	    $column_search = array('g_id', 'g_tracking_no', 'g_membership', 'g_hh_id', 'g_hh_set', 'g_fullname', 'g_sex', 'g_region', 'g_province', 'g_city_muncipality', 'g_barangay', 'g_subj_complaint', 'g_mode', 'category_name', 'sub_category_name', 'g_description', 'g_resolution', 'g_date_intake', 'g_date_encode', 'g_assist_by', 'h.root_description', 'g_gbv_age', 'a.root_description', 'a.root_description', 'b.root_description', 'c.root_description', 'd.root_description', 'e.root_description', 'f.root_description', 'g_ip_affiliation'); 

	    $order = array('g_id' => 'desc'); 
	    $list = $this->Model_datatable->get_datatables($table, $select, $joinTbl1, $joinArgs1, $joinTbl2, $joinArgs2, $joinTbl3, $joinArgs3, $joinTbl4, $joinArgs4, $joinTbl5, $joinArgs5, $joinTbl6, $joinArgs6, $joinTbl7, $joinArgs7, $joinTbl8, $joinArgs8, $joinTbl9, $joinArgs9, $whereInCol, $whereInArgs, $whereArgs, $whereLike, $whereMonth, $whereYear, $column1, $groupBy, $column_order, $column_search, $order, $havingArgs);
	    $data = array();
	    $no = $this->input->post('start');
	    foreach ($list as $grievance) {
	      $no++;
	      $row = array();
	      $row[] = $grievance->g_id;
	      $row[] = $grievance->g_beneficiary_id;
	      $row[] = ucfirst(strtolower($grievance->g_membership));
	      $row[] = $grievance->g_tracking_no;
	      $row[] = ucwords(strtolower($grievance->g_fullname));
	      $row[] = $grievance->g_sex;
	      $row[] = $grievance->g_hh_id;
	      $row[] = $grievance->g_hh_set;
	      $row[] = ucwords(strtolower($grievance->g_purok));
	      $row[] = ucwords(strtolower($grievance->g_barangay));
	      $row[] = ucwords(strtolower($grievance->g_city_muncipality));
	      $row[] = ucwords(strtolower($grievance->g_province));
	      $row[] = ucwords(strtolower($grievance->g_region));
	      $row[] = $grievance->g_contact;
	      $row[] = $grievance->category_name;
	      $row[] = $grievance->g_category;
	      $row[] = $grievance->sub_category_name;
	      $row[] = $grievance->g_sub_category;
	      $row[] = $grievance->g_description;
	      $row[] = $grievance->g_resolution;
	      $row[] = $grievance->g_location;
	      $row[] = ucwords(strtolower($grievance->g_assist_by));
	      $row[] = $grievance->dateE;
	      $row[] = $grievance->dateI;
	      $row[] = ucfirst(strtolower($grievance->g_subj_complaint));
	      $row[] = $grievance->rcaRoot;
	      $row[] = $grievance->rcaID;
	      $row[] = $grievance->g_gbv_sex;
	      if ($grievance->g_gbv_age != 0) {
		      $row[] = $grievance->g_gbv_age;
	      } else {
		      $row[] = NULL;
	      }
	      $row[] = $grievance->g_mode;
	      $row[] = $grievance->aRoot;
	      $row[] = $grievance->bRoot;
	      $row[] = $grievance->cRoot;
	      $row[] = $grievance->dRoot;
	      $row[] = $grievance->eRoot;
	      $row[] = $grievance->fRoot;
	      $row[] = $grievance->aID;
	      $row[] = $grievance->bID;
	      $row[] = $grievance->cID;
	      $row[] = $grievance->dID;
	      $row[] = $grievance->eID;
	      $row[] = $grievance->fID;
	      $row[] = ucwords(strtolower($grievance->g_ip_affiliation));
	     

	      $data[] = $row;
	    }

	    $output = array(
	      "draw" => $this->input->post('draw'),
	      "recordsTotal" => $this->Model_datatable->count_all($table),
	      "recordsFiltered" => $this->Model_datatable->count_filtered($table, $select, $joinTbl1, $joinArgs1, $joinTbl2, $joinArgs2, $joinTbl3, $joinArgs3, $joinTbl4, $joinArgs4, $joinTbl5, $joinArgs5, $joinTbl6, $joinArgs6, $joinTbl7, $joinArgs7, $joinTbl8, $joinArgs8, $joinTbl9, $joinArgs9, $whereInCol, $whereInArgs, $whereArgs, $whereLike, $whereMonth, $whereYear, $column1, $groupBy, $column_order, $column_search, $order, $havingArgs),
	      "data" => $data,
	    );
	    echo json_encode($output);
	  }

	  public function fetch_rca2() {
	  	$rca = $this->input->get('cat_id');
	    $result = $this->Model_grievance->query("SELECT * FROM root_cause INNER JOIN category on category.category_id = root_cause.category_id WHERE root_cause.category_id = '$rca'")->result();
	    echo json_encode($result);
	  }

	  public function search_root() {
	    $search = $this->input->get('search');
	    $result = $this->Model_root->query("SELECT * FROM root_cause WHERE root_code LIKE '%$search%' AND root_code NOT LIKE '%GAD%' LIMIT 10")->result();
	    echo json_encode($result);
  	  }

}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	

	public function index()
	{
		$this->load->model('search_model');
		if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->birds_model->get_bird($q);
		}
	}



}

public function autocomplete_courses_desc (){
	$json = [];

	exit();

	$this->load->database();

	if(!empty($this->input->get("q"))){
			//$this->db->like('name', $this->input->get("q"));
		$query = $this->db->select('description')
		->limit(10)
		->get('courses');
		$json = $query->result();
	}


	echo json_encode($json);
}

}
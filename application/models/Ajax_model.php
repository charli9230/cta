<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {


	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get_course_purpose($id){
		$this->db->select('purpose');
		$this->db->where('courseID', $id);
		$this->db->from('course');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();

		/*print_r($row);
		exit();*/

		$data = array(
		'purpose' => $row[0]['purpose']
		);



    	if ($query->num_rows() > 0) {
        return $data;
	    } else {
	        return false;
	    }
	}
}

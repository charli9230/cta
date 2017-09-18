<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model   extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}


	public function get_desc($qs)
	{    
		$this->db->select('description');
		$this->db->like('description', $q);
		$query = $this->db->get('course');
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
        $row_set[] = htmlentities(stripslashes($row['description'])); //build an array
    }
      echo json_encode($row_set); //format the array into json data
  }
}
}

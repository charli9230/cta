<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Courses_model extends CI_Model {


	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	
	public function insert_course($data)
	{
	
		$this->db->insert('course', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return  false;
		}
	}

	public function update_course($data,$id)
	{
		$this->db->where('courseID', $id);
		$this->db->update('course', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return  false;
		}
	}
	public function select_all_course(){
		$this->db->select('*');
		$this->db->from('course');
		$query = $this->db->get();
    	if ($query->num_rows() > 0) {
        return $query;
	    } else {
	        return false;
	    }

	}

	public function select_all_event_by_num($Num_sel){
		$this->db->select('*');
		$this->db->where('startDate >', date("Y-m-d"));
		$this->db->from('event');
		$this->db->order_by("startDate", "asc");
		$this->db->limit($Num_sel);
		$query = $this->db->get();
    	if ($query->num_rows() > 0) {
        return $query;
	    } else {
	        return false;
	    }

	}

		public function select_stud_event(){
		$this->db->select('*');
		$this->db->where('studentID', $id);
		$this->db->from('event');
		$this->db->order_by("startDate", "asc");
		$this->db->limit(3);
		$query = $this->db->get();

    	if ($query->num_rows() > 0) {
        return $query;
	    } else {
	        return false;
	    }
	}

	public function select_next_five_event(){
		$this->db->select('*');
		$this->db->where('startDate >', date("Y-m-d"));
		$this->db->from('event');
		$this->db->order_by("startDate", "asc");
		$this->db->limit(3);
		$query = $this->db->get();

    	if ($query->num_rows() > 0) {
        return $query;
	    } else {
	        return false;
	    }
	}

	public function select_one_course($id){

		//$query = $this->db->query("SELECT * FROM event WHERE startDate>".date('Y-m-d'));


		$this->db->select('*');
		$this->db->where('courseID', $id);
		$this->db->from('course');
		$this->db->limit(1);
		$query = $this->db->get();

    	if ($query->num_rows() > 0) {
        return $query;
	    } else {
	        return false;
	    }
	}

}
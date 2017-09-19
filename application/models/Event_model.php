<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Event_model extends CI_Model {


	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	public function select_all_event_student_registered($id){
		#Create where clause
		$this->db->select('eventID');
		$this->db->from('event_student');
        $this->db->where('completed',false);
		$where_clause = $this->db->get_compiled_select();

		#Create main query
		$this->db->select('*');
		$this->db->from('event');
		$this->db->where("`eventID` IN ($where_clause)", NULL, FALSE);
		$query = $this->db->get();
		$row = $query->result_array();
    	if ($query->num_rows() > 0) {
        return $row;
	    } else {
	        return false;
	    }
	}
    public function select_all_event_student_completed($id){
        #Create where clause
        $this->db->select('eventID');
        $this->db->from('event_student');
        $this->db->where('completed',true);
        $this->db->where('studentID',$id);
        $where_clause = $this->db->get_compiled_select();

        #Create main query
        $this->db->select('e.*','s.date_completed');
        $this->db->from('event e','event_student s');
        $this->db->where("`e.eventID` IN ($where_clause)", NULL, true);
        $query = $this->db->get();
        $row = $query->result_array();
        if ($query->num_rows() > 0) {
            return $row;
        } else {
            return false;
        }
    }



	public function select_all_event_student_unregistered($id){
		#Create where clause
		$this->db->select('eventID');
		$this->db->from('event_student');
		$where_clause = $this->db->get_compiled_select();

		#Create main query
		$this->db->select('*');
		$this->db->from('event');
		$this->db->where("`eventID` IN ($where_clause)", NULL, true);

		$query = $this->db->get();
		$row = $query->result_array();
    	if ($query->num_rows() > 0) {
        return $row;
	    } else {
	        return false;
	    }
	}
	public function get_ev_title($id){
		$this->db->select('description');
		$this->db->where('courseID', $id);
		$this->db->from('course');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();

		/*print_r($row);
		exit();*/

		/*$data = array(
		'purpose' => $row[0]['purpose']
		);*/



    	if ($query->num_rows() > 0) {
        return $row;
	    } else {
	        return false;
	    }
	}
	public function insert_event($data)
	{
	
		$this->db->insert('event', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return  false;
		}
	}
	public function update_event($data,$id)
	{
		$this->db->where('eventID', $id);
		$this->db->update('event', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return  false;
		}
	}
	public function select_all_event(){
		$this->db->select('e.*');
		$this->db->from('event e');
		$this->db->order_by("startDate", "asc");
		$query = $this->db->get();
		$row = $query->result_array();
    	if ($query->num_rows() > 0) {
        return $row;
	    } else {
	        return false;
	    }
	}
	public function select_all_event_for_student(){
	    #Create where clause
		$this->db->select('eventID');
		$this->db->from('event_student');
        //$this->db->where('status','Unregistered');
		$where_clause = $this->db->get_compiled_select();

		#Create main query
		$this->db->select('*');
		$this->db->from('event');
		$this->db->where("`eventID` NOT IN ($where_clause)", NULL, true);
		$query = $this->db->get();
		$row = $query->result_array();
    	if ($query->num_rows() > 0) {
        return $row;
	    } else {
	        return false;
	    }
	}
	public function select_all_event_student($studentID){
		#Create where clause
		$this->db->select('eventID');
		$this->db->from('event_student');
		$where_clause = $this->db->get_compiled_select();

		#Create main query
		$this->db->select('*');
		$this->db->from('event');
		$this->db->where("`eventID` NOT IN ($where_clause)", NULL, FALSE);
		$query = $this->db->get();
		$row = $query->result_array();
    	if ($query->num_rows() > 0) {
        return $row;
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
	public function select_all_courses(){
		$this->db->select('courseID,description,purpose');
		$this->db->from('course');
		$this->db->order_by("description", "asc");
		$query = $this->db->get();
    	if ($query->num_rows() > 0) {
        return $query;
	    } else {
	        return false;
	    }
	}
	public function select_one_event($id){

		//$query = $this->db->query("SELECT * FROM event WHERE startDate>".date('Y-m-d'));


		$this->db->select('*');
		$this->db->where('eventID', $id);
		$this->db->from('event');
		$this->db->limit(1);
		$query = $this->db->get();

    	if ($query->num_rows() > 0) {
        return $query;
	    } else {
	        return false;
	    }
	}

}
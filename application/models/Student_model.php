<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
                // Your own constructor code 
	}
	
	public function insert_student($data)
	{
		$this->db->insert('student', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
			
		} else {
			return false;
		}
	}

	public function register_student_for_course($data)
	{

		$this->db->insert('event_student', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deregister_student_for_course($data)
	{
        $this->db->delete('event_student', $data);

		//$this->db->insert('event_student', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function check_student_exist($data)
	{
		$this->db->insert('student', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
			
		} else {
			return false;
		}
	}

	public function mail_exists($key)
	{
	    $this->db->where('email',$key);
	    $query = $this->db->get('student');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}
	public function get_students_attending_courses()
	{
		$this->db->select('student.firstName, student.lastName, event_student.attendance,event.title,event.startDate');
		$this->db->where('student.studentID=event_student.studentID');
		$this->db->where('event_student.eventID=event.eventID');
		$this->db->from('student,event_student,event');
		$query = $this->db->get();
		$row = $query->result_array();
	/*	echo $row['lastLoginDateTime'];
		exit();*/
    	if ($query->num_rows() > 0) {
        return $query;
	    } else {
	        return false;
	    }
	}

	public function check_registered_already ($data_check){
		$this->db->select('studentID, eventID');
		$this->db->from('event_student');
		$this->db->where('eventID=',$data_check['eventID']);
		$this->db->where('studentID=',$data_check['studentID']);
		$query = $this->db->get();
    	if ($query->num_rows() > 0) {
        return true;
	    } else {
	        return false;
	    }

	}

		public function select_all_event_student_registered($studentID){
		#Create where clause
		$this->db->select('eventID');
		$this->db->from('event_student');
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
}

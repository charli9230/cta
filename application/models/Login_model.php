<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model  extends CI_Model {

	public function __construct()
	{
		parent::__construct();
                // Your own constructor code
	}
	public function get_user_student($data)
	{
		//$email = $data['email'];
		$this->db->select('*');
		$this->db->where('email', $data);
		$this->db->from('student');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->row_array();
	/*	echo $row['lastLoginDateTime'];
		exit();*/
    	if ($query->num_rows() > 0) {
        return $row;
	    } else {
	        return false;
	    }
	}
	public function get_user_staff($data)
	{
		//$email = $data['email'];
		$this->db->select('*');
		$this->db->where('email', $data);
		$this->db->from('staff');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->row_array();
    	if ($query->num_rows() > 0) {
        return $row;
	    } else {
	        return false;
	    }
	}


	public function get_stud_pwd($datapwd)
	{
		$email = $datapwd['email'];
		$this->db->select('password');
		$this->db->where('email', $email);
		$this->db->from('student');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->row_array();
    	if ($query->num_rows() > 0) {

        return  $row['password'];;
	    } else {
	        return false;
	    }
	}

	public function get_staff_pwd($datapwd)
	{
		//$email = $datapwd['email'];
		$this->db->select('password');
		$this->db->where('email', $datapwd);
		$this->db->from('staff');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->row_array();
    	if ($query->num_rows() > 0) {

        return  $row['password'];;
	    } else {
	        return false;
	    }
	}
/*
	Escaping Queries
	----------------
	$this->db->escape() This function determines the data type so that it can escape only string data. It also automatically adds single quotes around the data so you don't have to:
		$sql = "INSERT INTO table (title) VALUES(".$this->db->escape($title).")";

		$this->db->escape_str() This function escapes the data passed to it, regardless of type. Most of the time you'll use the above function rather than this one. Use the function like this:
		$sql = "INSERT INTO table (title) VALUES('".$this->db->escape_str($title)."')";

		$this->db->escape_like_str() This method should be used when strings are to be used in LIKE conditions so that LIKE wildcards ('%', '_') in the string are also properly escaped.
		$search = '20% raise';
		$sql = "SELECT id FROM table WHERE column LIKE '%".$this->db->escape_like_str($search)."%'";*/

/*
		UPDATE
		------
		$this->db->update_string();

		This function simplifies the process of writing database updates. It returns a correctly formatted SQL update string. Example:

		$data = array('name' => $name, 'email' => $email, 'url' => $url);

		$where = "author_id = 1 AND status = 'active'"; 

		$str = $this->db->update_string('table_name', $data, $where);*/
}

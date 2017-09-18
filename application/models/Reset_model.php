<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_model   extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function mail_exists($key)
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
}

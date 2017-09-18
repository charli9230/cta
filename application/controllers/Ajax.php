<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax  extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{

	}

	public function get_course_purpose()
	{
		$this->load->model('Ajax_model');
		$id = $this->input->post('id');
		$data['course_desc']= $this->Ajax_model->get_course_purpose($id);
		echo json_encode($data);
		
		//echo json_encode($data);
		//return $data['course_desc'][0]['purpose'];
		//return $data;
	} 
		
}
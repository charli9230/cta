<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
                // Your own constructor code
	}



		public function index()
	{
		$this->load->view('student/resetpassword/reset_password_header');
		$this->load->view('student/resetpassword/reset_password_nav');
		$this->load->view('student/resetpassword/reset_password');
		$this->load->view('student/resetpassword/reset_password_footer');
	}


	public function Reset_Password_Student_form()
	{
		$this->load->view('student/resetpassword/reset_password_header');
		$this->load->view('student/resetpassword/reset_password_nav');
		$this->load->view('student/resetpassword/reset_password');
		$this->load->view('student/resetpassword/reset_password_footer');
		
	}
	public function Reset_Password_Staff_form()
	{
		$this->load->view('staff/resetpassword/reset_password_header');
		$this->load->view('staff/resetpassword/reset_password_nav');
		$this->load->view('staff/resetpassword/reset_password');
		$this->load->view('staff/resetpassword/reset_password_footer');
		
	}
	public function Reset_Password_Security_question()
	{
		$this->form_validation->set_rules('email', 'Email','callback_rolekey_exists','trim|required|valid_email');
		if ($this->form_validation->run() == FALSE)
		{
			$data ['message'] = 'Incorrect email!';
			$this->load->view('student/resetpassword/reset_password_header');
			$this->load->view('student/resetpassword/reset_password_nav');
			$this->load->view('student/resetpassword/reset_password',$data);
			$this->load->view('student/resetpassword/reset_password_footer');

		}else{

			$data ['message'] = 'We are still working on this!!!';
			$this->load->view('student/resetpassword/reset_password_header');
			$this->load->view('student/resetpassword/reset_password_nav');
			$this->load->view('student/resetpassword/reset_password',$data);
			$this->load->view('student/resetpassword/reset_password_footer');
		}
		
	}

	 function rolekey_exists($key) {
		return $this->Reset_model->mail_exists($key);
	}
}

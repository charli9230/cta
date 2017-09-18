<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('home/header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('home/nav');


		/*Body*/
		$this->load->view('home/home');


		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('home/footer');
		$this->load->view('footer/end_footer');

	}




	public function staff_login_form()
	{	
		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('staff/login/header');
		$this->load->view('header/end_header');

		/*Body*/
		$this->load->view('staff/login/login');


		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/login/footer');
		$this->load->view('footer/end_footer');
		
	}

	public function student_login_form()
	{
		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('student/login/header');
		$this->load->view('header/end_header');

		/*Body*/
		$this->load->view('student/login/login');

		
		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('student/login/footer');
		$this->load->view('footer/end_footer');
	}




	public function is_valid_password($password,$dbpassword){
		$rotations = 0;
		$salt = substr($dbpassword, 0, 64);

		$hash = $salt . $password;

		for ( $i = 0; $i < $rotations; $i ++ ) {
			$hash = hash('sha256', $hash);
		}

	//Sleep a bit to prevent brute force
		time_nanosleep(0, 400000000);
		$hash = $salt . $hash;

		return $hash == $dbpassword;
	}
	function encrypt_password($password, $username){
		$rotations = 0;
		$salt = hash('sha256', uniqid(mt_rand(), true) . "somesalt" . strtolower($username));
		$hash = $salt . $password;
		for ( $i = 0; $i < $rotations; $i ++ ) {
			$hash = hash('sha256', $hash);
		}
		return $salt . $hash;
	}


	public function login_student_validation(){
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			$this->student_login_form();
		}
		else{


			$datapwd = array('email' =>$this->input->post('email'));
			$dbpassword = $this->Login_model->get_stud_pwd($datapwd);

			if($this->is_valid_password($this->input->post('password'),$dbpassword)){

				$result = $this->Login_model->get_user_student($datapwd ['email']);


				if($result==false){
					//Sleep a bit to prevent brute force
					time_nanosleep(0, 400000000);
					$data ['message'] = 'Incorrect Username or Password!';

					/*Header*/
					$this->load->view('header/start_header');
					$this->load->view('bootstrap/bootstrap_header');
					$this->load->view('font_awesome/font_awesome');
					$this->load->view('student/login/header');
					$this->load->view('header/end_header');

					/*Body*/
					$this->load->view('student/login/login',$data);

					
					/*Footer*/
					$this->load->view('bootstrap/bootstrap_footer');
					$this->load->view('student/login/footer');
					$this->load->view('footer/end_footer');

				}else{
					
					$data['info'] = $this->Login_model->get_user_student($datapwd ['email']);
					$data['message'] = 'Welcome '. $data['info']['firstName'];
					//$data ['all_courses'] = $this->Event_model->select_all_courses();
					$data ['all_event'] = $this->Event_model->select_all_event_for_student();
					$data ['all_status'] = $this->Event_model->select_all_event_student($data['info']['studentID']);

			/*		print_r($data['all_status']);
					exit();*/

					/*Setting Session data*/
					$session_data = array(
						'username' => $data['info']['email'],
						'id' => $data['info']['studentID']);
					$this->session->set_userdata('logged_in', $session_data);


					/*Header*/
					$this->load->view('header/start_header');
					//$this->load->view('bootstrap/bootstrap_header');
					$this->load->view('font_awesome/font_awesome');
					$this->load->view('table_bootstrap/data_table_header');
					$this->load->view('student/profile/student_prof_header');
					$this->load->view('header/end_header');

					/*Nav Bar*/
					$this->load->view('student/profile/student_prof_nav',$data);


					/*Body*/
					$this->load->view('student/profile/student_profile',$data);


					/*Footer*/
					$this->load->view('bootstrap/bootstrap_footer');
					//$this->load->view('student/profile/student_prof_footer');
					$this->load->view('table_bootstrap/data_table_footer');
					$this->load->view('footer/end_footer');	
				}
			}
			else{
			//Sleep a bit to prevent brute force
				time_nanosleep(0, 400000000);
				$data ['message'] = 'Incorrect Username or Password!';
				

				/*Header*/
				$this->load->view('header/start_header');
				$this->load->view('bootstrap/bootstrap_header');
				$this->load->view('font_awesome/font_awesome');
				$this->load->view('student/login/header');
				$this->load->view('header/end_header');

				/*Body*/
				$this->load->view('student/login/login',$data);

				
				/*Footer*/
				$this->load->view('bootstrap/bootstrap_footer');
				$this->load->view('student/login/footer');
				$this->load->view('footer/end_footer');
			}
		}
	}

	public function login_staff_validation(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
		//redirect('home', 'refresh');
			$this->student_login_form();
		}
		else{
	

			$datapwd = array('email' =>$this->input->post('email'));
			$dbpassword = $this->Login_model->get_staff_pwd($datapwd['email']);

			if($this->is_valid_password($this->input->post('password'),$dbpassword)){

				$result = $this->Login_model->get_user_staff($datapwd['email']);

				if($result==false){
					//Sleep a bit to prevent brute force
					time_nanosleep(0, 400000000);
					$data ['message'] = 'Incorrect Username or Password!';

					/*Header*/
					$this->load->view('header/start_header');
					$this->load->view('bootstrap/bootstrap_header');
					$this->load->view('font_awesome/font_awesome');
					$this->load->view('staff/login/header');
					$this->load->view('header/end_header');

					/*Body*/
					$this->load->view('staff/login/login',$data);


					/*Footer*/
					$this->load->view('bootstrap/bootstrap_footer');
					$this->load->view('staff/login/footer');
					$this->load->view('footer/end_footer');

				}else{

					$sess_array = array();

					$sess_array = array(
						'id' => $result['staffID'],
						'username' => $result['email']
						);
					$this->session->set_userdata('logged_in', $sess_array);

					$data = array(
						'message' => 'Welcome to your home page.',
						'info'=>$result);

					/*Header*/
					$this->load->view('header/start_header');
					$this->load->view('bootstrap/bootstrap_header');
					$this->load->view('font_awesome/font_awesome');
					$this->load->view('staff/profile/staff_prof_header');
					$this->load->view('header/end_header');

					/*Nav Bar*/
					$this->load->view('staff/shared/staff_nav',$data);


					/*Body*/
					$this->load->view('staff/profile/staff_profile',$data);


					/*Footer*/
					$this->load->view('bootstrap/bootstrap_footer');
					//$this->load->view('staff/profile/staff_prof_footer');
					$this->load->view('google/google_address_footer');
					$this->load->view('footer/end_footer');

				}
			}
			else{
			//Sleep a bit to prevent brute force
				time_nanosleep(0, 400000000);
				$data ['message'] = 'Incorrect Username or Password!';


				/*Header*/
				$this->load->view('header/start_header');
				$this->load->view('bootstrap/bootstrap_header');
				$this->load->view('font_awesome/font_awesome');
				$this->load->view('staff/login/header');
				$this->load->view('header/end_header');

				/*Body*/
				$this->load->view('staff/login/login',$data);


				/*Footer*/
				$this->load->view('bootstrap/bootstrap_footer');
				$this->load->view('staff/login/footer');
				$this->load->view('footer/end_footer');
			}
		}
	}

	// Logout from admin page
	public function logout($id) {

	// Removing session data
		$sess_array = array(
			'id' => '',
			'username' => ''
			);

		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		
		if($id=='s'){
			$this->student_login_form();
		}else{
			$this->staff_login_form();
		}

		
	}

}

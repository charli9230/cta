<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	

	public function index()
	{
/*		$this->load->view('home/header');
		$this->load->view('home/nav');
		$this->load->view('home/intro');
		$this->load->view('home/about');
		$this->load->view('home/courses');
		$this->load->view('home/contact');
        $this->load->view('home/footer');*/


        /*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('home/header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('home/nav');


		/*Body*/
		$this->load->view('home/intro');
		$this->load->view('home/about');
		$this->load->view('home/courses');
		$this->load->view('home/contact');


		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('home/footer');
		$this->load->view('footer/end_footer');

	}

	public function get_all_event(){
		/*print_r($id);
		exit();*/

		$data ['all_event'] = $this->Event_model->select_all_event();

		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/event/event_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');

		/*Body*/
		$this->load->view('staff/event/event_list',$data);

		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/event/event_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('footer/end_footer');


	}

	public function get_all_event_for_table(){
		$data ['all_event'] = $this->Event_model->select_all_event();

		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/event/event_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');

		/*Body*/
		$this->load->view('staff/event/event_list_for_table',$data);

		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/event/event_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('footer/end_footer');



	}
/*	public function get_all_event_for_table_by_num($Num_sel){

		$data ['all_event'] = $this->Event_model->select_all_event_by_num($Num_sel);
		$data ['Num_sel'] = $Num_sel ;

	
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/event/event_header');
		$this->load->view('header/end_header');

		
		$this->load->view('staff/shared/staff_nav');

		$this->load->view('staff/event/event_list_for_table',$data);

		
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/event/event_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('footer/end_footer');
	}*/






	public function select_events_for_student($studenID){

		$data ['my_events'] = $this->Event_model->select_events_for_student($studenID);

		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/event/event_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');

		/*Body*/
		$this->load->view('staff/event/event_list_for_table',$data);

		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/event/event_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('footer/end_footer');
	}

	
	public function call_event($id){
	

		$data ['one_event'] = $this->Event_model->select_one_event($id);
		$data ['all_courses'] = $this->Courses_model->select_all_course();
		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/event/event_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');

		/*Body*/
		$this->load->view('staff/event/event_details',$data);

		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/event/event_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('footer/end_footer');


	}

		public function update_event()
	{
		$this->form_validation->set_rules('time', 'Time', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('courseID', 'Event Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|callback_check_equal_less');
		$this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
		$this->form_validation->set_rules('venue', 'Venue', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
/*			print_r($this->input->post('eventID'));
			exit();*/
			/*redirect('/event');*/
			$data ['one_event'] = $this->Event_model->select_one_event($this->input->post('eventID'));
			$data ['all_courses'] = $this->Courses_model->select_all_course();


			/*Header*/
			$this->load->view('header/start_header');
			$this->load->view('bootstrap/bootstrap_header');
			$this->load->view('font_awesome/font_awesome');
			$this->load->view('table_bootstrap/data_table_header');
			$this->load->view('staff/event/event_header');
			$this->load->view('header/end_header');

			/*Nav bar*/
			$this->load->view('staff/shared/staff_nav');

			/*Body*/
			$this->load->view('staff/event/event_details',$data);

			/*Footer*/
			$this->load->view('bootstrap/bootstrap_footer');
			$this->load->view('staff/event/event_footer');
			$this->load->view('google/google_address_footer');
			$this->load->view('table_bootstrap/data_table_footer');
			$this->load->view('footer/end_footer');



		}
		else
		{
			$get_event_title_by_id = $this->Event_model->get_ev_title($this->input->post('courseID'));

			$data = array(
					'time' =>$this->input->post('time'),
					'courseID' =>$this->input->post('courseID'),
					'title' =>$get_event_title_by_id[0]['description'],
					'description' =>$this->input->post('description'),
					'startDate' =>nice_date($this->input->post('start_date'),'Y-m-d'),
					'endDate' =>nice_date($this->input->post('end_date'),'Y-m-d'),
					'venue' => $this->input->post('venue')
			);
			$id = $this->input->post('eventID');

			if($this->Event_model->update_event($data, $id)){
				$data = array (
					'path_redirect'=>'all_ev_tbl',
					'message'=>'Return to Event List'
					);
				$this->load->view('success',$data);
			}else{

				$this->get_all_event();
			}
		}
	}
	

	public function create_event()
	{
		$this->form_validation->set_rules('time', 'Time', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('courseID', 'Event Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|callback_check_equal_less');
		$this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
		$this->form_validation->set_rules('venue', 'Venue', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			/*print_r('form validation');
			exit();*/
			/*redirect('/event');*/
			$data ['next_five_events'] = $this->Event_model->select_next_five_event();
			/*Header*/
			$this->load->view('header/start_header');
			$this->load->view('bootstrap/bootstrap_header');
			$this->load->view('font_awesome/font_awesome');
			$this->load->view('table_bootstrap/data_table_header');
			$this->load->view('staff/event/event_header');
			$this->load->view('header/end_header');

			/*Nav bar*/
			$this->load->view('staff/shared/staff_nav');

			/*Body*/
			$this->load->view('staff/event/event_form',$data);

			/*Footer*/
			$this->load->view('bootstrap/bootstrap_footer');
			$this->load->view('staff/event/event_footer');
			$this->load->view('google/google_address_footer');
			$this->load->view('table_bootstrap/data_table_footer');
			$this->load->view('footer/end_footer');
		}
		else
		{
			$get_event_title_by_id = $this->Event_model->get_ev_title($this->input->post('courseID'));

			/*print_r($get_event_title_by_id[0]['description']);
			exit();*/


			$data = array(
					'time' =>$this->input->post('time'),
					'courseID' =>$this->input->post('courseID'),
					'title' =>$get_event_title_by_id[0]['description'],
					'description' =>$this->input->post('description'),
					'startDate' =>nice_date($this->input->post('start_date'),'Y-m-d'),
					'endDate' =>nice_date($this->input->post('end_date'),'Y-m-d'),
					'venue' => $this->input->post('venue')
			);
			

			if($this->Event_model->insert_event($data)){
				$data = array (
					'path_redirect'=>'all_ev_tbl',
					'message'=>'View Event List'
					);
				$this->load->view('success',$data);
			}else{

				$this->get_all_event_for_table();
			}
		}
	}
	
	 function check_equal_less(){
		$startDate=nice_date($this->input->post('start_date'),'Y-m-d');
		$endDate=nice_date($this->input->post('end_date'),'Y-m-d');

		if(strtotime($endDate) <= strtotime($startDate)){
			$this->form_validation->set_error_delimiters('<div id="error">', '</div>');
			$this->form_validation->set_message('check_equal_less','Your Start Date must be earlier than your End Date');
			return false;
		}else{
			return true;
		}
	}
	public function form()
	{
		$data ['all_courses'] = $this->Event_model->select_all_courses();
/*		$data['course_desc']= $this->Ajax_model->get_course_purpose(1010);
		print_r($data['course_desc']);
		exit();*/
		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/event/event_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');

		/*Body*/
		$this->load->view('staff/event/event_form',$data);

		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/event/event_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('footer/end_footer');
		
	}


	public function student_ev()
	{
		$data ['stud_events'] = $this->Event_model->select_stud_event();
		
		$this->load->view('staff/event/event_header');
		$this->load->view('staff/shared/staff_nav');
		$this->load->view('staff/event/event_form',$data);
		$this->load->view('staff/event/event_footer');

		
	}
}

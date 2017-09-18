<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	
	public function index()
	{
		
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

	public function courses_form(){

		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/courses/courses_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');


		/*Body*/
		$this->load->view('staff/courses/courses_form');


		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/courses/courses_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('footer/end_footer');
	}


	public function get_all_courses(){

		$data ['all_courses'] = $this->Courses_model->select_all_course();

		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/courses/courses_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');


		/*Body*/
		$this->load->view('staff/courses/courses_list',$data);


		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/courses/courses_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('footer/end_footer');
	}

	public function load_one_course($id){
	

		$data ['one_course'] = $this->Courses_model->select_one_course($id);

		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/courses/courses_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');


		/*Body*/
		$this->load->view('staff/courses/courses_details',$data);


		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/courses/courses_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('footer/end_footer');


	}


	public function update_course()
	{
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('purpose', 'Purpose', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{

			$data ['one_course'] = $this->Courses_model->select_one_course($id);

			/*Header*/
			$this->load->view('header/start_header');
			$this->load->view('bootstrap/bootstrap_header');
			$this->load->view('font_awesome/font_awesome');
			$this->load->view('table_bootstrap/data_table_header');
			$this->load->view('staff/courses/courses_header');
			$this->load->view('header/end_header');

			/*Nav bar*/
			$this->load->view('staff/shared/staff_nav');


			/*Body*/
			$this->load->view('staff/courses/courses_details',$data);


			/*Footer*/
			$this->load->view('bootstrap/bootstrap_footer');
			$this->load->view('staff/courses/courses_footer');
			$this->load->view('table_bootstrap/data_table_footer');
			$this->load->view('google/google_address_footer');
			$this->load->view('footer/end_footer');
		}
		else
		{
			$data = array(
					'description' =>$this->input->post('description'),
					'purpose' =>$this->input->post('purpose'),
					'lastModifiedBy' =>'Admin Name');
			$id = $this->input->post('courseID');

			if($this->Courses_model->update_course($data, $id)){
				$data = array (
					'path_redirect'=>'view_all_courses',
					'message'=>'View List of Course'
					);
				$this->load->view('success',$data);
			}else{

				//$data ['all_courses'] = $this->Courses_model->select_all_course();

				/*$this->load->view('staff/courses/courses_header');
				$this->load->view('staff/shared/staff_nav');
				$this->load->view('staff/courses/courses_form',$data);
				$this->load->view('staff/courses/courses_footer');*/

				/*Header*/
				$this->load->view('header/start_header');
				$this->load->view('bootstrap/bootstrap_header');
				$this->load->view('font_awesome/font_awesome');
				$this->load->view('table_bootstrap/data_table_header');
				$this->load->view('staff/courses/courses_header');
				$this->load->view('header/end_header');

				/*Nav bar*/
				$this->load->view('staff/shared/staff_nav');


				/*Body*/
				$this->load->view('staff/courses/courses_form',$data);


				/*Footer*/
				$this->load->view('bootstrap/bootstrap_footer');
				$this->load->view('staff/courses/courses_footer');
				$this->load->view('table_bootstrap/data_table_footer');
				$this->load->view('google/google_address_footer');
				$this->load->view('footer/end_footer');
			}
		}
	}

	public function create_course()
	{
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('purpose', 'Purpose', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{

			$data ['all_courses'] = $this->Courses_model->select_all_course();
			/*$this->load->view('staff/courses/courses_header');
			$this->load->view('staff/shared/staff_nav');
			$this->load->view('staff/courses/courses_form',$data);
			$this->load->view('staff/courses/courses_footer');*/


			/*Header*/
			$this->load->view('header/start_header');
			$this->load->view('bootstrap/bootstrap_header');
			$this->load->view('font_awesome/font_awesome');
			$this->load->view('table_bootstrap/data_table_header');
			$this->load->view('staff/courses/courses_header');
			$this->load->view('header/end_header');

			/*Nav bar*/
			$this->load->view('staff/shared/staff_nav');


			/*Body*/
			$this->load->view('staff/courses/courses_form',$data);


			/*Footer*/
			$this->load->view('bootstrap/bootstrap_footer');
			$this->load->view('staff/courses/courses_footer');
			$this->load->view('table_bootstrap/data_table_footer');
			$this->load->view('google/google_address_footer');
			$this->load->view('footer/end_footer');
		}
		else
		{
			$data = array(
					'description' =>$this->input->post('description'),
					'purpose' =>$this->input->post('purpose'),
					'lastModifiedBy' =>'Admin Name');

			if($this->Courses_model->insert_course($data)){
				$data = array (
					'path_redirect'=>'course',
					'message'=>'View List of Course'
					);
				$this->load->view('success',$data);
			}else{
/*				print_r('no insert');
				exit();*/
				redirect('/courses');
			}
		}
	}
}

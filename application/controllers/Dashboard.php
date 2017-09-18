<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
        }


	public function index()
	{


		$data = array(
				'message' => 'Welcome back');


		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/profile/staff_prof_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav',$data);

		/*Body*/
		$this->load->view('staff/profile/staff_profile',$data);

		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/profile/staff_prof_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('footer/end_footer');
	}

	public function dashboard()
	{
		$data = array(
				'message' => 'Welcome back');

		/*Header*/
		$this->load->view('header/start_header');
		$this->load->view('bootstrap/bootstrap_header');
		$this->load->view('font_awesome/font_awesome');
		$this->load->view('table_bootstrap/data_table_header');
		$this->load->view('staff/profile/staff_prof_header');
		$this->load->view('header/end_header');

		/*Nav bar*/
		$this->load->view('staff/shared/staff_nav');

		/*Body*/
		$this->load->view('staff/profile/staff_profile',$data);

		/*Footer*/
		$this->load->view('bootstrap/bootstrap_footer');
		$this->load->view('staff/profile/staff_prof_footer');
		$this->load->view('google/google_address_footer');
		$this->load->view('table_bootstrap/data_table_footer');
		$this->load->view('footer/end_footer');
	}
}

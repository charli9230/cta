<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
        }

	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/nav');
		$this->load->view('home/intro');
		$this->load->view('home/about');
		$this->load->view('home/courses');
		$this->load->view('home/contact');
        $this->load->view('home/footer');
	}
}

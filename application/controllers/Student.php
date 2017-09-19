<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
        {
            parent::__construct();

        }
    public function index()
    {
        $this->load->view('home/header');
        $this->load->view('home/nav');
        $this->load->view('home/home');
        $this->load->view('home/footer');
    }
    public function record_student_attendance()
    {
        /*$this->form_validation->set_rules('firstName', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dateOfBirth', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');*/




        $result ['studAttend'] = $this->Student_model->get_students_attending_courses();
        print_r($result);
        //exit();
        if($result==true){

            $this->load->view('staff/students/students_header');
            $this->load->view('staff/students/students_nav',$result);
            $this->load->view('staff/students/student_attendance',$result);
            $this->load->view('staff/students/students_footer');
        }else{

            $data ['link'] =  "<a style='color:white;' href='".site_url()."/login/log1'>Take me to the login Page</a>";
        }

    }
    public function view_all_event_student_can_register_for()
    {
        if(isset($this->session->userdata['logged_in'])){

            $email =$this->session->userdata['logged_in']['username'];
            $data['info'] = $this->Login_model->get_user_student($email);
            $data['message'] = 'Welcome '. $data['info']['firstName'];
            //$data ['all_courses'] = $this->Event_model->select_all_courses();
            $data ['all_event'] = $this->Event_model->select_all_event_for_student();
            $data ['all_status'] = $this->Event_model->select_all_event_student($data['info']['studentID']);


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
    public function view_event_student_registered_for()
    {
        if(isset($this->session->userdata['logged_in'])){

            $email =$this->session->userdata['logged_in']['username'];

            $data['info'] = $this->Login_model->get_user_student($email);
            $data['message'] = 'Hello '. $data['info']['firstName'].'! Below are the courses you registered for.';
            //$data ['all_courses'] = $this->Event_model->select_all_courses();
            $data ['all_event'] = $this->Event_model->select_all_event();
            $data ['registered_for'] = $this->Event_model->select_all_event_student_registered($this->session->userdata['logged_in']['id']);

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
            $this->load->view('student/event/registered_for',$data);


            /*Footer*/
            $this->load->view('bootstrap/bootstrap_footer');
            //$this->load->view('student/profile/student_prof_footer');
            $this->load->view('table_bootstrap/data_table_footer');
            $this->load->view('footer/end_footer');
        }

    }
    public function list_of_event_student_can_deregister_from(){

        $email =$this->session->userdata['logged_in']['username'];
        $data['info'] = $this->Login_model->get_user_student($email);
        $data['message'] = 'Hello '. $data['info']['firstName'].'! Below are the courses you registered for.';
        //$data ['all_courses'] = $this->Event_model->select_all_courses();
        $data ['all_event'] = $this->Event_model->select_all_event();
        $data ['registered_for'] = $this->Event_model->select_all_event_student_registered($this->session->userdata['logged_in']['id']);

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
        $this->load->view('student/event/registered_for',$data);


        /*Footer*/
        $this->load->view('bootstrap/bootstrap_footer');
        //$this->load->view('student/profile/student_prof_footer');
        $this->load->view('table_bootstrap/data_table_footer');
        $this->load->view('footer/end_footer');
    }
    public function deregister_student_for_course()
        {
            /*print_r('call deregister_student_for_course');
            exit();*/

            /*First Check if session exist and if not redirect to student loggin*/

            if(isset($this->session->userdata['logged_in'])){

                $this->form_validation->set_rules('id', 'Course ID', 'trim|required|xss_clean');


            if ($this->form_validation->run() == FALSE) //Beginning of #region
            {
                print_r('form validation is false foe deregistration');
                exit();

                $email =$this->session->userdata['logged_in']['username'];
                $data['info'] = $this->Login_model->get_user_student($email);
                $data['message'] = 'Hello '. $data['info']['firstName'].'! Below are the courses you registered for.';
                //$data ['all_courses'] = $this->Event_model->select_all_courses();
                $data ['all_event'] = $this->Event_model->select_all_event();
                $data ['registered_for'] = $this->Event_model->select_all_event_student_registered($this->session->userdata['logged_in']['id']);

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
                $this->load->view('student/event/registered_for',$data);


                /*Footer*/
                $this->load->view('bootstrap/bootstrap_footer');
                //$this->load->view('student/profile/student_prof_footer');
                $this->load->view('table_bootstrap/data_table_footer');
                $this->load->view('footer/end_footer');

            }else{

               /* print_r('form validation is true for deregistration');
                exit();*/


                $data_dergister = array(
                    'eventID' =>$this->input->post('id'),
                    'completed' => false);

                $data_check = array(
                    'eventID' =>$this->input->post('id'),
                    'studentID' =>$this->session->userdata['logged_in']['id']);

                $registered = $this->Student_model->check_registered_already ($data_check);

                /*print_r($registered);
                exit();*/

                if($registered==true){
                   /* print_r('changing status from registered to unregistered');
                    exit();*/
                $result = $this->Student_model->deregister_student_for_course($data_dergister);



                if($result==true){

                   /* print_r('student deregistered succesfully');
                   exit();*/

                    $email =$this->session->userdata['logged_in']['username'];
                    $data['info'] = $this->Login_model->get_user_student($email);
                    $data['message'] = 'Hello '. $data['info']['firstName'].'! Below are the courses you registered for.';
                    //$data ['all_courses'] = $this->Event_model->select_all_courses();
                    $data ['all_event'] = $this->Event_model->select_all_event();
                    $data ['registered_for'] = $this->Event_model->select_all_event_student_unregistered($this->session->userdata['logged_in']['id']);

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
                    $this->load->view('student/event/registered_for',$data);


                    /*Footer*/
                    $this->load->view('bootstrap/bootstrap_footer');
                    //$this->load->view('student/profile/student_prof_footer');
                    $this->load->view('table_bootstrap/data_table_footer');
                    $this->load->view('footer/end_footer');

                }else{
                    /*To be added */
                }

                }else{

                   /* print_r('sudent is not registered for any course');
                    exit();*/


                    $email =$this->session->userdata['logged_in']['username'];
                    $data['info'] = $this->Login_model->get_user_student($email);
                    $data['message'] = 'Hello '. $data['info']['firstName'].'! Below are the courses you registered for.';
                    //$data ['all_courses'] = $this->Event_model->select_all_courses();
                    $data ['all_event'] = $this->Event_model->select_all_event();
                    $data ['registered_for'] = $this->Event_model->select_all_event_student_registered($this->session->userdata['logged_in']['id']);

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
                    $this->load->view('student/event/registered_for',$data);


                    /*Footer*/
                    $this->load->view('bootstrap/bootstrap_footer');
                    //$this->load->view('student/profile/student_prof_footer');
                    $this->load->view('table_bootstrap/data_table_footer');
                    $this->load->view('footer/end_footer');
                }


            }
        }else{
            /*Here we redirect user to login page if session doesnt exit*/
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
    }
    public function view_all_event_student_completed(){
        if(isset($this->session->userdata['logged_in'])){

            $email =$this->session->userdata['logged_in']['username'];

            $data['info'] = $this->Login_model->get_user_student($email);
            $data['message'] = 'Hello '. $data['info']['firstName'].'! Below are the courses you successfully completed.';
            //$data ['all_event'] = $this->Event_model->select_all_event();
            $data ['all_courses_compl'] = $this->Event_model->select_all_event_student_completed($this->session->userdata['logged_in']['id']);

           /* print_r($data['all_courses_compl']);
            exit();*/
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
            $this->load->view('student/event/completed_courses',$data);


            /*Footer*/
            $this->load->view('bootstrap/bootstrap_footer');
            //$this->load->view('student/profile/student_prof_footer');
            $this->load->view('table_bootstrap/data_table_footer');
            $this->load->view('footer/end_footer');
        }

    }
    public function register_student_for_course()
        {
            /*First Check if session exist and if not redirect to student loggin*/
            if(isset($this->session->userdata['logged_in'])){

                $this->form_validation->set_rules('id', 'Course ID', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) //Beginning of #region
            {
                $data = array(
                    'email' =>$this->session->userdata['logged_in']['username']);

                $data['info'] = $this->Login_model->get_user_student($data);
                $data['message'] = 'Sorry '. $data['info']['firstName'].' Something went wrong Please select a course again!';
                //$data ['all_courses'] = $this->Event_model->select_all_courses();
                $data ['all_event'] = $this->Event_model->select_all_event();
                $data ['all_status'] = $this->Event_model->select_all_event_student($this->session->userdata['logged_in']['id']);

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

            }else{

                $data = array(
                    'eventID' =>$this->input->post('id'),
                    'studentID' =>$this->session->userdata['logged_in']['id'],
                    'attendance' =>'0',
                    'performance' =>'0',
                    'comment' =>'None',
                    'status' =>'Registered');

                $data_check = array(
                    'eventID' =>$this->input->post('id'),
                    'studentID' =>$this->session->userdata['logged_in']['id']);

                /*print_r($data_check);
                exit();*/


                $registered = $this->Student_model->check_registered_already ($data_check);

                if($registered==false){

                $result = $this->Student_model->register_student_for_course($data);
                if($result==true){

                    $email =$this->session->userdata['logged_in']['username'];
                    $data['info'] = $this->Login_model->get_user_student($email);
                    $data['message'] = 'Welcome '. $data['info']['firstName'];
                    //$data ['all_courses'] = $this->Event_model->select_all_courses();
                    $data ['all_event'] = $this->Event_model->select_all_event_for_student();
                    $data ['all_status'] = $this->Event_model->select_all_event_student($data['info']['studentID']);


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
                }else{
                    /*To be added */
                }

                }else{

                    $data['info'] = $this->Login_model->get_user_student($this->session->userdata['logged_in']['username']);
                    $data['message'] = 'Welcome home '. $data['info']['firstName'];
                    //$data ['all_courses'] = $this->Event_model->select_all_courses();

                    $data ['all_event'] = $this->Event_model->select_all_event();
                    $data ['all_status'] = $this->Event_model->select_all_event_student($this->session->userdata['logged_in']['id']);
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
        }else{
            /*Here we redirect user to login page if session doesnt exit*/
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
    }
    public function student_reg_form()
    {
        $this->load->view('student/registration/header');
        $this->load->view('student/registration/registration');
        $this->load->view('student/registration/footer');
    }
    private function edit_profile()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['username'];

            $this->load->view('student/profile/student_prof_header');
            $this->load->view('student/profile/student_prof_nav',$data);
            $this->load->view('student/profile/student_edit_profile',$data);
            $this->load->view('student/profile/student_prof_footer');
        }
        else
        {
                //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
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
    public function submit_reg()
    {
        $this->form_validation->set_rules('firstName', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dateOfBirth', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('addressLine1', 'Address Line 1', 'trim|required|xss_clean');
        $this->form_validation->set_rules('addressLine2', 'Address Line 2');
        $this->form_validation->set_rules('street_number', 'street_number');
        $this->form_validation->set_rules('route', 'Route');
        $this->form_validation->set_rules('postalCode', 'Postal Code');
        $this->form_validation->set_rules('city', 'City');
        $this->form_validation->set_rules('province', 'Province');
        $this->form_validation->set_rules('country', 'Country');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordconfirm', 'Password Confirmation', 'required|matches[password]');


            if ($this->form_validation->run() == FALSE) //Beginning of #region
            {

                $this->load->view('student/registration/header');
                $this->load->view('student/registration/registration');
                $this->load->view('student/registration/footer');
            }else{

                $addressLine2 = $this->input->post('addressLine2');
                if($addressLine2 ==null)
                    $addressLine2='None';

                $password = $this->encrypt_password($this->input->post('password'),$this->input->post('email'));


                $data = array(
                    'firstName' =>$this->input->post('firstName'),
                    'lastName' =>$this->input->post('lastName'),
                    'dateOfBirth' =>$this->input->post('dateOfBirth'),
                    'phone' =>$this->input->post('phone'),
                    'addressLine1' =>$this->input->post('addressLine1'),
                    'addressLine2' =>$addressLine2,
                    'street_number' =>$this->input->post('street_number'),
                    'postalCode' =>$this->input->post('postalCode'),
                    'city' =>$this->input->post('city'),
                    'province' =>$this->input->post('province'),
                    'country' =>$this->input->post('country'),
                    'email' =>$this->input->post('email'),
                    'password' =>$password,
                    'lastLoginDateTime' => date("Y-m-d h:i:sa"),
                    'lastLoginIP' =>$this->input->ip_address(),
                    'route' =>$this->input->post('route') );

                $result = $this->Student_model->insert_student($data);
                if($result==true){

                    $data ['link'] =  "<a style='color:white;' href='".site_url()."/login/log1'>Take me to the login Page</a>";
                    $this->load->view('student/registration/header');
                    $this->load->view('formsuccess/formsuccess',$data);
                    $this->load->view('student/registration/footer');
                }else{

                    $data ['link'] =  "<a style='color:white;' href='".site_url()."/login/log1'>Take me to the login Page</a>";
                }


            }//End of #region


        }
    private function rolekey_exists($key) {
            return $this->Student_model->mail_exists($key);
        }
}

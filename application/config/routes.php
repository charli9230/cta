<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/*Default Controller*/
$route['default_controller'] = 'home';
/*Default Values*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Student*/
$route['attend_stud'] = 'student/$1';
$route['sub_reg'] = 'student/submit_reg';
$route['stu_reg_form'] = 'student/student_reg_form';
$route['reset_password'] = 'student/student_reg_form';
$route['register'] = 'student/student_reg_form';
$route['stud_attend']= 'student/record_student_attendance';
$route['view_all_stud']= 'student/view_all_students';
$route['upd_stud']= 'student/update_student_details';
$route['stu_reg_for_cour']= 'student/register_student_for_course';
$route['list_cour_stu_dereg']= 'student/list_of_event_student_can_deregister_from';
$route['stu_dereg_for_cour']= 'student/deregister_student_for_course';
$route['cours_stud_regted_for']= 'student/view_event_student_registered_for';
$route['list_cours_stud_regi']= 'student/view_all_event_student_can_register_for';
$route['list_cours_stu_compl']= 'student/view_all_event_student_completed';



/*Course*/
$route['add_courses'] = 'course/courses_form';
$route['view_all_courses'] = 'course/get_all_courses';
$route['load_course/(:num)'] = 'course/load_one_course/$1';
$route['submit_course'] = 'course/create_course';
$route['update_course'] = 'course/update_course';
$route['course'] = 'course/get_all_courses';


/*Event*/
$route['submit_event'] = 'event/create_event';
$route['event/(:num)'] = 'event/form';
$route['create_event'] = 'event/form';
$route['event/stud'] = 'event/student_ev';
$route['all_ev'] = 'event/get_all_event';
$route['all_ev_tbl'] = 'event/get_all_event_for_table';
$route['update_ev'] = 'event/update_event';
$route['event_stud/(:num)'] = 'event/select_events_for_student/$1';
$route['load_event/(:num)'] = 'event/call_event/$1';

/*Ajax*/
$route['cour_desc'] = "ajax/get_course_description";



/*Staff*/
$route['staff_dash'] = 'Dashboard/dashboard';



/*Login*/
$route['staff_log'] = 'login/staff_login_form';
$route['stud_log'] = 'login/student_login_form';
$route['log_stud_val'] = 'login/login_student_validation';
$route['log_staf_val'] = 'login/login_staff_validation';
$route['log_out/(:any)'] = 'login/logout/$1';


/*Registration*/
$route['staff_log'] = 'login/staff_login_form';



/*Reset*/
$route['admin_reset'] = 'reset/Reset_Password_Staff_form';
$route['stud_reset'] = 'reset/Reset_Password_Student_form';


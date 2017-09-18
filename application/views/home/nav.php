<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#top">FAMHEALTH</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" id="navcenter">
        <li class="active"><a href="#top">Home</a></li>
        <li><a  href="#about" title="All about FAMHEALTH NMU">About</a></li>
        <li><a  href="#courses" title="FAMHEALTH NMU Courses">Courses</a></li>
        <li><a  href="#contact" title="FAMHEALTH NMU Contact details (Tel, email, etc)">Contact</a></li>
        <li><a href="<?php echo site_url()?>/stu_reg_form" title="Register as a new student"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url()?>/stud_log" title="Login as registered student"><i class="fa fa-lock" aria-hidden="true"></i> Student</a></li>
              <li><a href="<?php echo site_url()?>/staff_log" title="Admin Login"><i class="fa fa-lock" aria-hidden="true"></i> Staff</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </nav

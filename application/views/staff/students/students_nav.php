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
      <a class="navbar-brand" href="#">Administrator</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url()?>index.php/dashboard">Dashboard</a></li>
      <li><a href="<?php echo base_url()?>index.php/event">Events</a></li>
      <li><a href="<?php echo base_url()?>index.php/courses">Courses</a></li>
       <li><a href="#">Student</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Settings
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#" title=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
              <li><a href="#" title=""><i class="fa fa-lock" aria-hidden="true"></i> Staff Settings</a></li>
              <li><a href="<?php echo site_url('login/prolog')?>" title="" id="canc_but"  data-toggle="modal" data-target=".bd-example-modal-sm" >Logout</a></li>
            </ul>
          </li>
    </ul>
    </div>
  </div>
</nav>






<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Logout?
            </div>

            <div class="modal-footer">
                <a href="<?php echo site_url('home')?>" class="btn btn-success" role="button">Yes</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

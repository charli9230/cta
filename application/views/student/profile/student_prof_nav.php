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
      <a class="navbar-brand" href="#">Student Account</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"></i>Courses
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('list_cours_stud_regi')?>" title="">Register</a></li>
              <li><a href="<?php echo site_url('list_cour_stu_dereg')?>" title="">Courses Enrolled</a></li>
              <li><a href="<?php echo site_url('list_cours_stu_compl')?>" title="">Courses Completed </a></li>
            </ul>
          </li>

      </li>
      <li><a href="#"></a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Settings
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#" title=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
              <li><a href="#" title="" id="canc_but"  data-toggle="modal" data-target=".bd-example-modal-sm" >Logout</a></li>
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
                <a href="<?php echo site_url('log_out/s')?>" class="btn btn-success" role="button">Yes</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container">

  <div class="row">
   <div class="col-lg-12  col-sm-12">


    <h1>LIST OF COURSES</h1>
    <hr>

  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="10%">Course ID</th>
            <th width="40%">Description</th>
            <th width="40%">Purpose</th>
            <th width="10%">Edit</th>
        </tr>
    </thead>
    
    <tbody>
        <?php if (isset($all_courses)) {?>        
        <?php foreach($all_courses->result_array() as  $the_courses) {  ?>
        <tr>
            <td><?php echo $the_courses['courseID'] ;?></td>
            <td><span class="more"><?php echo $the_courses['description'] ;?></span></td>
            <td><span class="more"><?php echo $the_courses['purpose'] ;?></span></td>
            <td>
            <a href="<?php echo base_url() ;?>index.php/load_course/<?php echo $the_courses['courseID']?>">Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>
</div>
</div>
</div>




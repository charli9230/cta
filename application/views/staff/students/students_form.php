<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container-fluid">

  <div class="row">
  


   <div class="col-lg-5 col-sm-offset-1 col-sm-5">


    <h1>List Of Courses</h1>
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

  <div  class="col-lg-4 col-sm-offset-1 col-sm-4">

        <h1>Add a course</h1>
        <hr>
        <?php echo form_open('submit_course'); ?>

        <div class="form-group">
          <label for="description">Descripttion</label>
          <?php echo form_error('description'); ?>
          <textarea   class="form-control" placeholder="Enter Description" name="description"><?php echo set_value('description'); ?></textarea>
        </div>

        <div class="form-group">
          <label for="venue">Purpose of the course</label>
          <?php echo form_error('venue'); ?>
           <textarea   class="form-control" placeholder="Enter Purpose" name="purpose"><?php echo set_value('purpose'); ?></textarea>
        </div>

       <button type="reset" class="btn btn-danger">Reset</button>
       <button type="submit" class="btn btn-success  pull-right">Save</button>
       <?php echo form_close(); ?>
     </div>

</div>
</div>




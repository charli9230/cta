<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container">

  <div class="row">

    <div  class="col-lg-6 col-sm-offset-2 col-sm-6">

        <h1>Update Course</h1>
        <hr>

   <?php if (isset($one_course)) {?>        
<?php foreach($one_course->result_array() as  $the_course) {  ?>      
        <?php echo form_open('update_course'); ?>

        <input type="text" hidden="true" name="courseID" value="<?php echo $the_course['courseID'] ;?>"/> 

        <div class="form-group">
          <label for="description">Descripttion</label>
          <?php echo form_error('description'); ?>
          <textarea   class="form-control" placeholder="Enter Description" name="description"><?php echo $the_course['description'] ;?></textarea>
        </div>

        <div class="form-group">
          <label for="venue">Purpose</label>
          <?php echo form_error('purpose'); ?>
          <textarea   class="form-control" placeholder="Enter Purpose" name="purpose"><?php echo $the_course['purpose'] ;?></textarea>
        </div>

       <button type="reset" class="btn btn-danger">Clear</button>
       <button type="submit" class="btn btn-success  pull-right">Save</button>

   <?php } ?>
<?php } ?>    
       <?php echo form_close(); ?>
     </div>
</div>
</div>





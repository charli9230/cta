<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container">

  <div class="row">
    <div  class="col-lg-8 col-sm-offset-2 col-sm-8">

        <h1>ADD A COURSE</h1>
        <hr>
        <?php echo form_open('submit_course'); ?>

        <div class="form-group">
          <label for="description">Description/Title</label>
          <?php echo form_error('description'); ?>
          <textarea   class="form-control" placeholder="Enter Description" required="true" name="description"><?php echo set_value('description'); ?></textarea>
        </div>

        <div class="form-group">
          <label for="venue">Purpose of the course</label>
          <?php echo form_error('venue'); ?>
           <textarea   class="form-control" placeholder="Enter Purpose" required="true" name="purpose"><?php echo set_value('purpose'); ?></textarea>
        </div>

       <button type="reset" class="btn btn-danger">Reset</button>
       <button type="submit" class="btn btn-success  pull-right">Save</button>
       <?php echo form_close(); ?>
     </div>
</div>
</div>




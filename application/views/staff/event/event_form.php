<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container">

  <div class="row">
    <div id="form_event" class="col-lg-8 col-sm-offset-2 col-sm-8">

      <h1 style="text-align: center;">CREATE AN EVENT</h1>
      <hr>
      <?php echo form_open('submit_event'); ?>

      <div class="form-group">
        <label for="title">Title</label>
        <?php echo form_error('title'); ?>
        <?php if (isset($all_courses)) {?> 
        <select name="courseID" id="courseID" class="form-control">
          <!-- <option selected="selected">Choose A Course</option> -->

          <?php foreach($all_courses->result_array() as  $the_courses) {  ?>
          <option value="<?= $the_courses['courseID'] ?>"><?= $the_courses['description'] ?>
          </option>
          <?php } ?>
          <?php } ?>
        </select> 
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <?php echo form_error('description'); ?>
        <textarea   class="form-control" placeholder="Enter Description" id="description" required="true" name="description"><?php echo set_value('description'); ?></textarea>
      </div>

      <div class="form-group">
        <label for="venue">Venue</label>
        <?php echo form_error('venue'); ?>
        <input type="text" class="form-control" id="autocomplete" required="true" onFocus="geolocate()"  name="venue"value="<?php echo set_value('venue'); ?>"/>
      </div>

      <div class="form-group">
        <label for="start_date">Start Date</label>
        <?php echo form_error('start_date'); ?>
        <input type="date" id="starDate"  class="form-control" required="true" name="start_date"value="<?php echo set_value('start_date'); ?>"/>
      </div>
      <div class="form-group">
       <label for="end_date">End Date</label>
       <?php echo form_error('end_date'); ?>
       <input type="date" id="endDate"  class="form-control" required="true" name="end_date"value="<?php echo set_value('end_date'); ?>"/>
     </div>
     <div class="form-group">
       <label for="time">Time</label>
       <?php echo form_error('end_date'); ?>
       <input type="time" id="time"  class="form-control" required="true" name="time" value="<?php echo set_value('time'); ?>"/>
     </div>
     <button type="reset" class="btn btn-danger">Reset</button>
     <button type="submit" class="btn btn-success  pull-right">Save</button>
     <?php echo form_close(); ?>
   </div>
 </div>
</div>


<script type="text/javascript">
  $(function(){
    $("#title").autocomplete({
    source: "search/index" // path to the get_birds method
  });
  });
</script>

<script type="text/javascript">

  $("#courseID").change(function(){

    var id = $('#courseID').val();
    //alert(id);

      $.ajax({
        url:'<?php echo site_url("Ajax/get_course_purpose")?>',
        type:'POST',
        data:{'id':id},
        dataType: 'json',
        cache: false,
        success:function(data){
          //var resdata = course_desc;
          //alert(JSON.stringify(resdata));
          
          $.each(data, function(i, val) {
              //alert(JSON.stringify(val.purpose));
              $("#description").html(val.purpose);
          });


          //alert(JSON.stringify(course_desc));
          //alert(JSON.parse(course_desc));
          //$("#description").html(val.purpose);
        },error: function(XMLHttpRequest, textStatus, errorThrown) {
         alert("Something went Wrong!!");
       }
     });
    });
</script>
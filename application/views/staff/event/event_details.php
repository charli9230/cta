<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container-fluid">

  <div class="row">
  <div class="col-lg-3 col-sm-3"></div>
    <div id="form_even_details" class="col-lg-6 col-sm-6">

        <h1>Update Event</h1>
        <hr>

   <?php if (isset($one_event)) {?>        
<?php foreach($one_event->result_array() as  $the_event) {  ?>      
        <?php echo form_open('update_ev'); ?>

        <input type="text" hidden="true" name="eventID" value="<?php echo $the_event['eventID'] ;?>"/> 

        <div class="form-group">



          <label for="title">Title</label>
          <?php echo form_error('title'); ?>
          
          <?php if (isset($all_courses)) {?>        
          <select name="courseID" id="courseID" class="form-control">
            <!-- <option selected="selected"></option> -->

            <?php foreach($all_courses->result_array() as  $the_courses) {  ?>
            <option value="<?= $the_courses['courseID'] ?>"><?= $the_courses['description'] ?>
            </option>
            <?php } ?>
            <?php } ?>

          </select> 
        </div>

        <div class="form-group">
          <label for="description">Descripttion</label>
          <?php echo form_error('description'); ?>
          <textarea   class="form-control" placeholder="Enter Description" id="description" name="description"><?php echo $the_event['description'] ;?></textarea>
        </div>

        <div class="form-group">
          <label for="venue">Venue</label>
          <?php echo form_error('venue'); ?>
          <input type="text" class="form-control" id="autocomplete" onFocus="geolocate()"  name="venue" value="<?php echo $the_event['venue'] ;?>"/>
        </div>

        <div class="form-group">
          <label for="start_date">Start Date</label>
          <?php echo form_error('start_date'); ?>
          <input type="date" id="starDate"  class="form-control" name="start_date" value="<?php echo $the_event['startDate'] ;?>"/>
        </div>
        <div class="form-group">
         <label for="end_date">End Date</label>
         <?php echo form_error('end_date'); ?>
         <input type="date" id="endDate"  class="form-control" name="end_date" value="<?php echo $the_event['endDate'] ;?>"/>
       </div>
       <div class="form-group">
         <label for="time">Time</label>
         <?php echo form_error('time'); ?>
         <input type="time" id="time"  class="form-control" name="time" value="<?php echo date('h:i',strtotime($the_event['time']));?>"/>
       </div>

       <!-- <input type="text"  name="timey" value="<?php echo date("h:i A",strtotime($the_event['time']));?>"/> -->

       <button type="reset" class="btn btn-danger">Clear</button>
       <button type="submit" class="btn btn-success  pull-right">Save</button>

   <?php } ?>
<?php } ?>    
       <?php echo form_close(); ?>
     </div>
       <div class="col-lg-3 col-sm-3"></div>
</div>
</div>
</div>



<script type="text/javascript">

  $("#courseID").change(function(){

    var id = $('#courseID').val();
    alert(id);

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
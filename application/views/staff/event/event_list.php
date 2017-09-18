<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container">

  <div class="row">
<div  class="col-lg-2 col-sm-2"></div>

   <div  class="col-lg-8 col-sm-8">
 <h1>Events List</h1>
<!--  <a href="<?php echo base_url()?>index.php/event/all_ev_tbl">Click here to display Eall events in a table</a> -->
        <hr>
          <ul class="event-list">
   <?php if (isset($all_event)) {?>        
<?php foreach($all_event->result_array() as  $the_events) {  ?>
            <li>
              <time datetime="<?php echo $the_events['startDate'] ;?>">
                <span class="day"><?php echo date("d", strtotime( $the_events['startDate']))?></span>
                <span class="month"><?php echo date("M", strtotime( $the_events['startDate']))?></span>
                <span class="year"><?php echo date("Y", strtotime( $the_events['startDate']))?></span>
                <span class="time"><?php echo date("F", strtotime($the_events['time'] ))?></span>
              </time>
              <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
              <div class="info">
                <h2 class="title"><?php echo $the_events['title'] ;?></h2>
                <p class="desc"> <a href="<?php echo base_url() ;?>index.php/load_event/<?php echo $the_events['eventID']?>">Click here to see event details.</a> </p>
              </div>
            </li>
<?php } ?>
<?php } ?>
          </ul>
</div>
<div  class="col-lg-2 col-sm-2"></div>
</div>
</div>




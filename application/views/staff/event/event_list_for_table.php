<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container">

  <div class="row">

    <h1>EVENT LIST</h1>
<!--     <a href="<?php echo base_url()?>index.php/event/all_ev">Click here to display the next coming events.</a> -->
    <hr>

<!--     <ul class="pagination">
      <li class="<?php if (isset($Num_sel) && $Num_sel==5)  {echo "active"; } else  {echo "";}?>"><a href="<?php echo base_url()?>index.php/event/all_ev_tbl/5">5</a></li>
      <li class="<?php if (isset($Num_sel) && $Num_sel==10) {echo "active"; } else  {echo "";}?>"><a href="<?php echo base_url()?>index.php/event/all_ev_tbl/10">10</a></li>
      <li class="<?php if (isset($Num_sel) && $Num_sel==20) {echo "active"; } else  {echo "";}?>"><a href="<?php echo base_url()?>index.php/event/all_ev_tbl/20">20</a></li>
      <li class="<?php if (isset($Num_sel) && $Num_sel==30) {echo "active"; } else  {echo "";}?>"><a href="<?php echo base_url()?>index.php/event/all_ev_tbl/30">30</a></li>
      <li class="<?php if (isset($Num_sel) && $Num_sel==40) {echo "active"; } else  {echo "";}?>"><a href="<?php echo base_url()?>index.php/event/all_ev_tbl/40">40</a></li>
      <li class="<?php if (isset($Num_sel) && $Num_sel==50) {echo "active"; } else  {echo "";}?>"><a href="<?php echo base_url()?>index.php/event/all_ev_tbl/50">50</a></li>
  </ul> -->

  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="5%">Event Title</th>
            <th width="20%">Description</th>
            <th width="10%">Venue</th>
            <th width="10%">Start Date</th>
            <th width="10%">End Date</th>
            <th width="5%">Time</th>
            <th width="5%">Edit</th>
        </tr>
    </thead>
    
    <tbody>
        <?php if (isset($all_event)) {?>        
        <?php foreach($all_event as  $the_events) {  ?>
        <tr>
            <td><?php echo $the_events['title'] ;?></td>
            <td> <span class="more"><?php echo $the_events['description'] ;?></span></td>
            <td><?php echo $the_events['venue'] ;?></td>
            <td><?php echo $the_events['startDate'] ;?></td>
            <td><?php echo $the_events['endDate'] ;?></td>
            <td><?php echo date("g:i a",strtotime($the_events['time']))?></td>
            <td>
            <a href="<?php echo base_url() ;?>index.php/load_event/<?php echo $the_events['eventID']?>">Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="#">Cancel <i class="fa fa-ban" aria-hidden="true"></i></a>
            <a href="#">Email <i class="fa fa-envelope-o" aria-hidden="true"></i></a>

            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>
</div>

</div>






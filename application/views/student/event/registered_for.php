<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->session->userdata['logged_in']['id']
?>

<div class="container">
	<?php if(isset($message)){; ?>
	<h1><?php echo $message; ?></h1>
	<?php }; ?>
	<hr>
	<div class="row">
		<div class="col-sm-6">
			<?php if (isset($info)) {?>        

			<?php echo 'Last Login:'.'  '. $info['lastLoginDateTime']  ;?>

			
		</div>
		<div class="col-sm-6">
	<!-- 	<?php echo 'Last Login IP Address:'.'  '. $info['lastLoginIP']  ;?>
		<?php } ?> -->
		</div>
	</div>
	<hr>
	  <div class="row">


   <div  class="col-lg-12 col-sm-12">
 <h1>Courses</h1>

        <hr>
           <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <tr>
            <th width="8%">Event ID</th>
            <th width="15%">Event Title</th>
            <th width="8%">Start Date</th> 
            <th width="1%">Time</th>
            <!-- <th width="15%">Venue</th> -->
            <!-- <th width="20%">Description</th> -->
           <!--  <th width="6%">Status</th> -->
            <th width="6%">Take Action</th>
          </tr>

          <?php if (isset($registered_for) && $registered_for!=false) {?>        
          <?php foreach($registered_for as  $reg_for) {  ?>

            <tbody>
          <tr>
            <td><?php echo $reg_for['eventID'] ;?></td>
            <td><?php echo $reg_for['title'] ;?></td> 
            <td><?php echo $reg_for['startDate'] ;?></td>
            <td><?php echo $reg_for['time'] ;?></td> 
            <!-- <td><?php echo $reg_for['venue'] ;?></td> -->
            <!-- <td><span class="more"><?php echo $reg_for['description'] ;?></span></td> -->

            <td>
            <?php echo form_open('stu_dereg_for_cour'); ?>
              <input type="text" hidden="true" name="id" value="<?php echo $reg_for['eventID'] ;?>" />
               <button type="submit" class="btn btn-success" value="Register" >De-register</button>
               <?php echo form_close();?>
            </td>
          </tr>
            </tbody>
<?php } ?>
<?php } ?>


        </table>
</div>

</div>
</div>




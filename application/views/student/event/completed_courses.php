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
            <th width="30%">Event Title</th>
            <th width="30%"> Completion Date</th>
            <th width="40%">Take Action</th>
          </tr>

          <?php if (isset($all_courses_compl) && $all_courses_compl!=false) {?>
          <?php foreach($all_courses_compl as  $comp_cour) {  ?>

            <tbody>
          <tr>

            <td><?php echo $comp_cour['title'] ;?></td>
            <td><?php echo $comp_cour['date_completed'] ;?></td>


            <td>
            <?php echo form_open('stu_dereg_for_cour'); ?>
              <input type="text" hidden="true" name="id" value="<?php echo $comp_cour['eventID'] ;?>" />
               <button type="submit" class="btn btn-success" value="Register" ><i class="fa fa-download" aria-hidden="true"></i> Download-Certificate</button>
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




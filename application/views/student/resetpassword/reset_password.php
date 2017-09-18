<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="container">
	<div id="pass_res">
    <h1 >Password Reset</h1>
</div>
			<div class="row main">
	 
				<div class="main-login main-center">
						 <?php $attributes = array('class'=>"form-horizontal"); ?>
            <?php echo form_open('Reset/rpssq', $attributes); ?>

						<div style="color: red; font-size: 20px;">
							<?php if(isset($message)){; ?>
							<?php echo $message; ?>
							<?php }; ?>
							</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" required="true" placeholder="Enter your Email"/>
								</div>
								<small class="text-muted">To reset your password, submit your email address</small>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Reset password</button>
						</div>
						<div class="login-register">
				            
							<a href="#" class="pull-left">Choose another method</a>

				            <a href="#" class="pull-right" id="canc_but" role="button" data-toggle="modal" data-target=".bd-example-modal-sm">Cancel process</a>
				         </div>
					 <?php echo form_close();?>
				</div>
			</div>
		</div>



<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password Reset Cancellation Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>

            <div class="modal-footer">
                <a href="<?php echo site_url('home')?>" class="btn btn-success" role="button">Yes</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

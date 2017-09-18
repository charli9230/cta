<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($this->session->userdata['logged_in'])) {

header("location:".site_url()."/login/login_student_validation");
}
?>





<div class="container">
<div style="color: white; font-size: 20px;">
<?php if(isset($message)){; ?>
<?php echo $message; ?>
<?php }; ?>
<?php echo validation_errors(); ?>
</div>
    <div id="wrapper">
        <div id="login_div">
        <h1>Staff Login</h1>
            <?php $attributes = array('id' => 'msform', 'class'=>"login-inner"); ?>
            <?php echo form_open('log_staf_val', $attributes); ?>

            <div class="input-field">
                <i class="mdi-social-person-outline prefix"></i>
                <input class="validate" name="email" id="email" required="true" type="email" value="<?php echo set_value('email'); ?>">
                <label for="email" data-error="wrong" data-success="right" class="center-align">Enter Your Email</label>
            </div>
            <br>
            <br>
            <div class="input-field">
                <i class="mdi-action-lock-outline prefix"></i>
                <input id="password" required="true" name="password" type="password">
                <label for="password">Password</label>
            </div>

            <div class="input-field">
                <input type="checkbox" id="remember-me"/>
                <label for="remember-me">Remember me</label>
            </div>

            <div class="input-field">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            </div>

            <p>
            <ul>
                <li>
                    <a href="<?php echo site_url('admin_reset');?>" id="forgot">Forgot password?</a><br>
                </li>
                <li>
                    <a href="<?php echo site_url('home');?>" id="cancel">Return Home</a>
                </li>
            </ul> 
            </p>

            <br>
            <br>
            <?php echo form_close();?>
        </div>
    </div>
</div>





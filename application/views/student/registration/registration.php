<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
<div id="stud_reg_pro">
    <h1 >Student Registration</h1>
</div>
<div style="color: white; font-size: 20px;">
<?php if(isset($message)){; ?>
<?php echo $message; ?>
<?php echo validation_errors(); ?>
<?php }; ?>

</div>
    
</div>

<!-- multistep form -->
<?php $attributes = array('id' => 'msform', 'name' => 'registration'); ?>
<?php echo form_open('sub_reg', $attributes); ?>
<!-- progressbar -->
<ul id="progressbar">
    <li class="active">Personal Details</li>
    <li>Address</li>
    <li>Create your account</li>
</ul>
<!-- fieldsets -->
<div class="fieldset">
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">This is step 1</h3>

    <label for="firstName" class="pull-left">First Name</label>
    <input type="text"  id="FirstName" placeholder="First Name" name="firstName" required="true" value="<?php echo set_value('firstName'); ?>">

    <label for="lastName" class="pull-left">Last Name</label>
    <input type="text"  id="lastName" placeholder="Last Name" name="lastName" value="<?php echo set_value('lastName'); ?>">


    <label for="dateOfBirth" class="pull-left">Date of Birth</label>
    <input type="date" name="dateOfBirth" id="dateOfBirth" placeholder="YYYY/MM/DD" value="<?php echo set_value('dateOfBirth'); ?>">


    <label for="phone" class="pull-left">Phone</label>
    <input type="text" name="phone" id="phone" placeholder="Phone" class="input-medium bfh-phone" data-country="ZA" value="<?php echo set_value('phone'); ?>"/>

    <input type="button" name="next" id="next1"  class="next action-button" value="Next" />
   <a href="#" class="btn btn-sm pull-right btn-danger" id="canc_but" role="button" data-toggle="modal" data-target=".bd-example-modal-sm">Cancel</a>

</div>


<div class="fieldset">
    <h2 class="fs-title">Address</h2>
    <h3 class="fs-subtitle">This is step 2</h3>

    <label for="autocomplete" class="pull-left">Address Line 1</label>
    <input id="autocomplete" name="addressLine1" placeholder="Address Line 1" onFocus="geolocate()"  type="text" value="<?php echo set_value('addressLine1'); ?>"></input>

    <label for="addressLine2" class="pull-left">Address Line 2</label>
    <input type="text" name="addressLine2" id="addressLine2"   placeholder="Address Line 2" value="<?php echo set_value('addressLine2'); ?>">

    <label for="postal_code" class="pull-left">Postal Code</label>
    <input type="number" id="postal_code" disabled="true" name="postalCode" readonly="true" value="<?php echo set_value('postalCode'); ?>">

    <label for="locality"  class="pull-left">City</label>
    <input type="text" id="locality" disabled="true" name="city" readonly="true" value="<?php echo set_value('city'); ?>">

    <input type="text" id="street_number" disabled="true" name="street_number" hidden="true" value="<?php echo set_value('street_number'); ?>"/>
    <input type="text" id="route" disabled="true" name="route" hidden="true" value="<?php echo set_value('route'); ?>">

    <input type="text" id="administrative_area_level_1" disabled="true" name="province" hidden="true" value="<?php echo set_value('province'); ?>">
    <input type="text" id="country" disabled="true" hidden="true" name="country" value="<?php echo set_value('country'); ?>">

    <input type="button" name="previous" class="previous action-button" value="Previous" />


    <input type="button" name="next" id="next2" class="next action-button" value="Next" />
     <a href="#" class="btn btn-sm pull-right btn-danger" id="canc_but" role="button" data-toggle="modal" data-target=".bd-example-modal-sm">Cancel</a>
</div>



<div class="fieldset">
    <h2 class="fs-title"> Create your account</h2>
    <h3 class="fs-subtitle">This is step 3</h3>

    <label for="email" class="pull-left">Email Address</label>
    <input type="email" id="email" placeholder="Email Address" required="true" name="email" value="<?php echo set_value('email'); ?>">

    <label for="password" class="pull-left">Password</label>
    <input type="password" id="password" name="password" required="true" />
    <span style="text-decoration: none;font-size: 8px; color: red;">6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter</span>

    <br>
    <label for="confirm_password" class="pull-left">Confirm Password</label>
    <input type="password" id="confirm_password"  name="passwordconfirm"  required="true"/>
    <span id='valid'></span><br>
    <span id='message'></span><br>

    <input type="button" name="previous" class="previous action-button" value="Previous" />

    <input type="submit" id="submit" class="submit action-button" value="Submit"  />
    <a href="#" class="btn btn-sm pull-right btn-danger" id="canc_but" role="button" data-toggle="modal" data-target=".bd-example-modal-sm">Cancel</a>

    
</div>
<?php echo form_close(); ?>


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancellation Confirmation</h5>
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


<script>
$(document).ready(function() {
    $('#msform').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            dateOfBirth: {
                validators: {
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The value is not a valid date'
                    }
                }
            }
        }
    });
});
</script>
<form method="post" action="<?php echo base_url('signin/verify') ?>">	
 <div id='verify-otp' class="login-setup-section">
    <i class="fa fa-chevron-left" aria-hidden="true"></i>
    <h3 class="request-otp-header">Verify OTP</h3>
    <!--error message -->
	<?php if($this->session->flashdata('error')){?>
	<div style="color:red"><?php echo $this->session->flashdata('error');?></div>
	<?php } ?>
    <input type="hidden" name="mobile" value="<?php echo $mobile; ?>"  />
    <div class="form-group login-label">
        <label for="inputnumber">One Time Password</label>
        <input type="otp" name="otp" class="form-control input-edit" placeholder='Enter OTP' id="otp">
    </div>
    <button type="submit" class="btn btn-default btn-lg btn-block request-otp ">Verify</button>
</div>
</form>
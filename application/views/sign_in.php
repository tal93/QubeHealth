<div class="container new-login-area">
  <div id='sign-in' class='login-setup-section'>
		<form method="post" action="<?php echo base_url('signin/login')?>">
        <h3 class="request-otp-header">Please verify your mobile number</h3>
        <!--error message -->
				<?php if($this->session->flashdata('error')){?>
				<div style="color:red"><?php echo $this->session->flashdata('error');?></div>
				<?php } ?>
        <div class="form-group login-label">
            <label for="inputnumber">mobile number</label>
            <input type="text" class="form-control input-edit" placeholder='Enter mobile number' id="mobile" name="mobile">
        </div>
        <button type="submit" class="btn btn-default btn-lg btn-block request-otp">Get OTP</button>
    </form>
    </div>
</div>

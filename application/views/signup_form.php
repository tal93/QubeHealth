
<!--success message -->
<?php if($this->session->flashdata('success')){?>
<p style="color:green"><?php  echo $this->session->flashdata('success');?></p>	
<?php } ?>

<!--error message -->
<?php if($this->session->flashdata('error')){?>
<div style="color:red"><?php echo $this->session->flashdata('error');?></div>
<?php } ?>
<div class="container login">
	<form class="form-signin" action="<?php echo base_url('user/add_user'); ?>" method="post">
		<h2 class="form-signin-heading">Create user</h2>


		<div class="form-group">
	    <label for="name">Name</label>
	    <input type="name" class="form-control" id="name" name="name" placeholder="Name">
	  </div>
	  <div class="form-group">
	    <label for="mobile">Mobile</label>
	    <input type="mobile" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
	  </div>
	  <button type="submit" class="btn btn-primary request-otp">Submit</button>
		    <a href="<?=base_url('user');?>" class="btn btn-warning">Back</a>
		</div>
	</form>
</div>
  
    
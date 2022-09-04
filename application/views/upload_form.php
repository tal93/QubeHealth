<h3>Upload a picture!</h3>
<hr />

<!--success message -->
<?php if($this->session->flashdata('success')){?>
<p style="color:green"><?php echo $this->session->flashdata('success');?></p>  
<?php } ?>

<div style="color:red">
	<?php echo validation_errors(); ?>
  <?php if(isset($error)){print $error;}?>
</div>
<?php echo form_open_multipart('upload/file_data');?>

  <div class="form-group">
    <label for="pic_title">Picture Title*:</label>
    <input type="text" class="form-control" name="pic_title" value="<?php echo set_value('pic_title'); ?>" id="pic_title">
  </div>
  <div class="form-group">
    <label for="pic_desc">Picture Description:</label>
    <textarea name="pic_desc" class="form-control" id="pic_desc"><?php echo set_value('pic_desc'); ?></textarea>
  </div>
  <div class="form-group">
    <label for="pic_file">Select Image*:</label>
    <input type="file" name="pic_file" class="form-control"  id="pic_file">
  </div>
  <a href="<?=base_url('user');?>" class="btn btn-warning">Back</a>
  <button type="submit" class="btn btn-success request-otp">Submit</button>
</form>
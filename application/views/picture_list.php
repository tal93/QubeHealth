  <h2>List of Pictures</h2>
  <?php if(count($picture_list)){?>
	  <table class="table table-bordered">
		<thead>
		  <tr>
			<th>Title</th>
			<th>Description</th>
			<th>Thumbnail</th>
		  </tr>
		</thead>
		<tbody>
		<?php foreach ($picture_list as $pic): ?>
		  <tr>
			<td><?php echo $pic->pic_title;?></td>
			<td><?php echo $pic->pic_desc;?></td>
			<td><a href="<?php echo base_url().'/uploads/'.$pic->pic_file;?>" target="_blank"><img src="<?php echo base_url().'/uploads/'.$pic->pic_file;?>" width="100" alt="<?= $pic->pic_title?>"></a></td>
		  </tr>
		<?php endforeach ?>
		</tbody>
	  </table>
	  <br />
	  <a href="<?php echo base_url().'upload/form';?>" class="btn btn-primary request-otp">Upload More</a>
  <?php } else { ?>
    <h4>No Pictures have been uploaded!. Click this button to <a href="<?php echo base_url().'upload/form';?>" class="btn btn-primary">upload</a></h4>            
  <?php } ?>
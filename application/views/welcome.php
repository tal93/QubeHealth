  <h2>List of Users</h2>

  <table class="table table-bordered">
	<thead>
	  <tr>
		<th>Name</th>
		<th>Mobile</th>
	  </tr>
	</thead>
	<tbody>
	<?php foreach ($user_list as $user): ?>
	  <tr>
		<td><?php echo $user->name;?></td>
		<td><?php echo $user->mobile;?></td>
	  </tr>
	<?php endforeach ?>
	</tbody>
  </table>
  <br />
<a href="<?php echo base_url().'user/form';?>" class="btn btn-primary request-otp">Add user</a>



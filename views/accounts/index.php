<div class="row">
<div class="col-sm-11"><h3>Accounts</h3></div>
<div class="col-sm-1">
	<a href="<?php echo APP_URL;?>accounts/add">
	<span class="glyphicon glyphicon-plus"></span>
	</a>
</div>
</div>
<table class="table">
<tr>
	<th>Name</th>
	<th>User</th>
	<th>Action</th>
</tr>
   <?php
   foreach ($accounts as $account):?>
   	<tr>
			<td><?php echo $account[2]; ?></td>
			<td><?php echo $account[4]; ?></td>
			<td>
				<a href="<?php echo APP_URL; ?>accounts/edit/<?php echo $account[0]; ?>">Edit</a>
				<a href="<?php echo APP_URL; ?>accounts/delete/<?php echo $account[0]; ?>">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
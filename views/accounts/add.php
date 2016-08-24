<h2>Add Accounts</h2>
<form action="<?php echo APP_URL; ?>accounts/add" method="post">
	<label for="user_id">User:</label>
	<select name="user_id">
		<?php foreach ($users as $user): ?>
			<option value="<?php echo $user["id"]; ?>"><?php echo $user["username"]; ?></option>
		<?php endforeach; ?>
	</select>
	<br>
	<label for="name">Name:</label>
	<input type="text" name="name">
	<br>
	<input type="submit" value="Save">
</form>
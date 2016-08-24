<form action="<?php echo APP_URL; ?>accounts/edit" method="post">
	<input type="hidden" name="id" value="<?php echo $account["id"]; ?>">
	<label for="user_id">User:</label>
	<select name="user_id">
		<?php foreach ($users as $user): ?>
			<option value="<?php echo $user["id"]; ?>"><?php echo $user["username"]; ?></option>
		<?php endforeach; ?>
	</select>
	<br>
	<label for="name">Name:</label>
	<input type="text" name="name" value="<?php echo $account["name"]; ?>">
	<br>
	<input type="submit" value="Save">
</form>
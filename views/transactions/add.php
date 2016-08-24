<h2>Add Transaction</h2>
<form action="<?php echo APP_URL; ?>transactions/add" method="post">
<p>
	<select name="account_id">
		<?php foreach ($accounts as $account): ?>
			<option value="<?php echo $account["id"]; ?>"><?php echo $account["name"]; ?></option>
		<?php endforeach; ?>
	</select></p>

	<p><br>
	<select name="category_id">
		<?php foreach ($categories as $category): ?>
			<option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
		<?php endforeach; ?>
	</select></p>
	<br>
	<label for="description">Description: </label>
	<input type="text" name="description">
	<br>
	<label for="amount">Amount: </label>
	<input type="number" name="amount" step="any">
	<br>
	<label for="date">Date: </label>
	<input type="date" name="date">
	<br>
	<input type="submit" value="Save">
</form>
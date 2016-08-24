<h2>Transaction</h2>
<form action="<?php echo APP_URL;?>transactions/edit" method="post">
<input type="hidden" name="id" value="<?php echo $transaction["id"]; ?>">
    <p>
    <label for="description">Description: </label>
    <input type="text" name="description"  value="<?php echo $transaction["description"]; ?>"></p>

    <p><label for="date">Date: </label>
    <input type="date" name="date"  value="<?php echo $transaction["date"]; ?>"></p>
    
    <p>
    <label for="amount">Amount: </label>
    <input type="number" name="amount" step="any"  value="<?php echo $transaction["amount"]; ?>"></p>
    <select name="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
        <?php endforeach; ?>
    </select></p>
    
    <input type="submit" value="Update">
</form>
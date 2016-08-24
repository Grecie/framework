
<form action="<?php echo APP_URL; ?>categories/edit" method="post">
    
    <input type="hidden" name="id" value="<?php echo $category["id"]; ?>">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="name" value="<?php echo $category["name"]; ?>">
    </p>
    <p>
        <input type="submit"value="update">
    </p>
</form>
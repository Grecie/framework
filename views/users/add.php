<h2>Add Users</h2>
<form action="<?php echo APP_URL; ?>users/add" method="POST">
    <p>
        <label for="username">Username: </label>
        <input type="text" name="username">
    </p>
    <p>
        <label for="password">Password: </label>
        <input type="password" name="password">
    </p>
    <p>
        <label for="rol">Rol:</label>
        <input type="text" name="rol">
    </p>
    <input type="submit" value="Save">
</form>
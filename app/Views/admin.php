<a href="/home">Go back to home</a>
<form method="post" class="admin">
    <label>Username
        <input type="text" name="username" value="<?= $_SESSION["User"]["username"] ?>" required>
    </label>
    <label>Email
        <input type="text" name="email" value="<?= $_SESSION["User"]["email"] ?>" required>
    </label>
    <label>Is Admin ?
        <input type="hidden" name="admin" value="0">
        <input type="checkbox" name="admin" value="1" <?= $_SESSION["User"]["admin"] == 1 ? "checked" : "" ?>>
    </label>
    <label>Password
        <input type="password" name="password" required>
    </label>
    <input type="submit" value="Update Info">
</form>
<?php include 'header.php'; ?>
<div class="admin">
    <h2>My Account</h2>
    <form method="post" class="form">
        <label class="form-item">Username
            <input type="text" name="username" value="<?= $_SESSION["User"]["username"] ?>" required>
        </label>
        <label class="form-item">Email
            <input type="text" name="email" value="<?= $_SESSION["User"]["email"] ?>" required>
        </label>
        <label class="form-item">Is Admin ?
            <input type="hidden" name="admin" value="0">
            <input type="checkbox" name="admin" value="1" <?= $_SESSION["User"]["admin"] == 1 ? "checked" : "" ?>>
        </label>
        <label class="form-item">Password
            <input type="password" name="password" required>
        </label>
        <input type="submit" value="Update Info">
    </form>
</div>
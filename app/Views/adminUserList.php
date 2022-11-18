<table class="user-table">
    <tr>
        <td>Username</td>
        <td>Email</td>
        <td>Is Admin</td>
        <td>Action</td>
    </tr>
    <?php
    /** @var App\Entity\User[] $users */

    use App\Entity\User;

    foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->getUsername() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="userId" value="<?= $user->getUserId() ?>">
                    <input type="hidden" name="admin" value="<?= $user->getAdmin() ?>">
                    <input type="hidden" name="checkboxValue" value='0'>
                    <input type="checkbox" name="checkboxValue" value='1' disabled <?= $user->getAdmin() == 1 ? "checked" : "" ?>>
                </form>
            <td>
                <form method="post">
                    <label>Delete
                        <input type="submit" name="userId" value="<?php $user->getUserId() ?>">
                    </label>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
</table>
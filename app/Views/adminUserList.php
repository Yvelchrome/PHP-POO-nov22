<?php include 'header.php'; ?>
<div class="user-list">
    <h2>User List</h2>

    <table class="user-table">
        <tr>
            <td class="title">Username</td>
            <td class="title">Email</td>
            <td class="title">Is Admin</td>
            <td class="title">Action</td>
        </tr>
        <?php
        /** @var App\Entity\User[] $users */

        foreach ($users as $user) : ?>
            <tr>
                <td><?= $user->getUsername() ?></td>
                <td><?= $user->getEmail() ?></td>
                <form method="post">
                    <td>
                        <input type="hidden" name="admin" value="<?= $user->getAdmin() ?>">
                        <input type="hidden" name="checkboxValue" value='0'>
                        <input type="checkbox" name="checkboxValue" value='1' disabled <?= $user->getAdmin() == 1 ? "checked" : "" ?>>
                    </td>
                    <td>
                        <?php if ($user->getUserId() !== $_SESSION["User"]["userId"]) : ?>
                            <label>Delete
                                <input type="hidden" name="userId" value="<?= $user->getUserId() ?>">
                                <input type="submit" value="">
                            </label>
                        <?php endif ?>
                    </td>
                </form>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<header class="header">
    <h1>PHP POO NOV22</h1>
    <ul class="list">
        <li><a class="list-link" href="/home">Home</a></li>
        <li><a class="list-link" href="/admin">Admin</a></li>
        <?php if ($_SESSION["User"]["admin"] == 1) : ?>
            <li><a class="list-link" href="/admin/userList">User List</a></li>
        <?php endif ?>
        <li><a class="list-link" href="/login">Logout</a></li>
    </ul>
</header>
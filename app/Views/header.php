<header class="header">
    <h1>PHP POO NOV22</h1>
    <ul class="list">
        <li><a class="list-link" href="/home">Home</a></li>
        <li><a class="list-link" href="/admin">Admin</a></li>
        <li><a class="list-link" href="<?= $_SESSION["User"]["admin"] == 1 ? "/admin/userList" : "javascript:void(0)" ?>">User List</a></li>
        <li><a class="list-link" href="/login">Logout</a></li>
    </ul>
</header>
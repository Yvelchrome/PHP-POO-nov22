<?php if (isset($error)) : ?>
    <span><?= $error ?></span>
<?php endif ?>
<div class="index">
    <div class="title">
        <h1 class="title__h1">PHP POO NOV22</h1>
        <h2 class="title__h2">Steven Godin | Loïc Jin</h2>
        <p>Utilisateur admin; username : admin, password : admin</p>
        <p>Utilisateur user; username : user, password : user</p>
    </div>
    <section class="container container--sign-in">
        <form class="container__form" method="post">
            <label class=" container__form__label">
                Username / Email
                <input class="container__form__input" name="username" type="text" required>
            </label>
            <label class="container__form__label">
                Password
                <input class="container__form__input" name="password" type="password" required>
            </label>
            <input class="container__form__submit" name="connection" type="submit" value="SIGN IN">
        </form>
        <p>First visit ? <a href="/" class="underline">Register</a></p>
    </section>
</div>

<?php
var_dump($_SESSION);

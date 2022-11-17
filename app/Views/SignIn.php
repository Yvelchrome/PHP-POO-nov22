<div class="index">
    <div class="title">
        <h1 class="title__h1">PHP POO NOV22</h1>
        <h2 class="title__h2">Steven Godin | Loïc Jin | Baptiste Verdier</h2>
    </div>
    <section class="container container--sign-in">
        <form class="container__form" action="./php/connection/sign_in.php" method="post">
            <label class="container__form__label">
                Username
                <input class="container__form__input" name="username" type="text" pattern="^[aA-z0-9_-]{3,15}$" required>
            </label>
            <label class="container__form__label">
                Password
                <input class="container__form__input" name="password" type="password" pattern="^[aA-z0-9_-]{3,15}$" required>
            </label>
            <input class="container__form__submit" name="connection" type="submit" value="SIGN IN">
        </form>
        <p>First visit ? <span class="underline">Register</span></p>
    </section>
</div>
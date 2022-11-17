<div class="index">
    <div class="title">
        <h1 class="title__h1">PHP POO NOV22</h1>
        <h2 class="title__h2">Steven Godin | Loïc Jin | Baptiste Verdier</h2>
    </div>
    <section class="container container--sign-up">
        <form class="container__form" method="post">
            <label class="container__form__label">
                Username
                <input class="container__form__input" name="username" type="text" required>
            </label>
            <label class="container__form__label">
                Email
                <input class="container__form__input" name="email" type="text" required>
            </label>
            <label class="container__form__label">
                Password
                <input class="container__form__input" name="password" type="password" required>
            </label>
            <label class="container__form__label">Admin
                <span class=" container__form--checkbox">
                    <input name="admin" type="checkbox" value="1">
                    <span class="slider round"></span>
                </span>
            </label>
            <input class="container__form__submit" name="submit" type="submit" value="SIGN UP">
        </form>
        <p>Already registered ? <a href="/login" class="underline">Log in</a></p>
    </section>
</div>
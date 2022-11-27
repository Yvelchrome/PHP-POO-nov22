<div class="index">
    <div class="title">
        <h1 class="title__h1">PHP POO NOV22</h1>
        <h2 class="title__h2">Steven Godin | Loïc Jin</h2>
    </div>
    <section class="container container--sign-up">
        <form class="container__form" method="post">
            <label class="container__form__label">
                Username
                <input class="container__form__input" name="username" type="text" pattern="^[a-z0-9_-]{3,15}$" required>
            </label>
            <label class="container__form__label">
                Email
                <input class="container__form__input" name="email" type="text" pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required>
            </label>
            <label class="container__form__label">
                Password
                <input class="container__form__input" name="password" type="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" required>
            </label>
            <label class="container__form__label">Admin
                <span class=" container__form--checkbox">
                    <input name="admin" type='hidden' value='0'>
                    <input name="admin" type="checkbox" value="1">
                    <span class="slider round"></span>
                </span>
            </label>
            <input class="container__form__submit" name="submit" type="submit" value="SIGN UP">
        </form>
        <p>Already registered ? <a href="/login" class="underline">Log in</a></p>
    </section>
</div>
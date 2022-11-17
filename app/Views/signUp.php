<form action="/login" mehtod="POST">
    <div class="container">
        <h1>Inscription</h1>
        <p>Remplissez les champs pour créer votre compte</p>
        <hr>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter username" name="username" id="username" required>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Mot de Passe</Param></b></label>
        <input type="password" placeholder="Enter votre mot de passe" name="psw" id="psw" required>

        <label for="psw-repeat"><b>Répétez votre Mot de Passe</b></label>
        <input type="password" placeholder="Entrez votre mot de passe à nouveau" name="psw-repeat" id="psw-repeat" required>
        <hr>
        <button type="submit" class="registerbtn">Inscription</button>
    </div>

    <div class="container signin">
        <p>Déjà membre ? <a href="signIn">Se connecter</a>.</p>
    </div>
</form>

<?php
/** @var App\Entity\User[] $users */
var_dump($users);
foreach ($users as $user) {
    echo $user->getUsername();
}

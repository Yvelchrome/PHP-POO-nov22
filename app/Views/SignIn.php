<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <form action="action_page.php">
    <div class="container">
        <h1>Inscription</h1>
        <p>Remplissez les champs pour créer votre compte</p>
        <hr>

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
        <p>Déjà membre ? <a href="#">Se connecter</a>.</p>
    </div>
    </form>
</body>

</html>
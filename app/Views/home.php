<h1>Bienvenue <?= $_SESSION["User"]["username"] ?></h1>
<a href="/login">Home</a>
<form action="" method="POST">

    <label for="content">Créez un nouveau post</label>
    <textarea name="content" id="content" cols="30
    0" rows="3" required></textarea>
    <label for="title">Titre</label>
    <input type="text" name="title" required>
    <button>Envoyer</button>
</form>
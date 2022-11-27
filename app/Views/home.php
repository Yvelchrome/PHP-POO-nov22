<h1><a href="/home">Bienvenue <?= $_SESSION["User"]["username"] ?></a></h1>
<a href="/login">Home</a>
<a href="/admin">Admin</a>
<form action="" method="POST" enctype="multipart/form-data">
    <label>Titre
        <input type="text" name="title" required>
    </label>
    <label>Créez un nouveau post
        <textarea name="content" id="content" cols="30
    0" rows="3" required></textarea>
    </label>
    <label>Image
        <input type="file" name="image" accept="image/jpeg, image/png, image/gif, image/jpg" value="">
    </label>
    <input type="submit" value="Envoyez">
</form>

<?php
/** @var App\Entity\Post[] $posts */
/** @var App\Entity\User[] $users */
foreach ($posts as $post) :
    foreach ($users as $user) {
        if ($user->getUserId() === $post->getUserId()) {
            $postUser = $user->getUsername();
        }
    };
?>
    <h3>Créateur : <?= $postUser ?></h3>
    <img src="/app/src/assets/images/<?= $post->getImage() ?>" alt="">
    <p> Créez : <?= $post->getCreationDate() ?></p>
    <h4>Titre : <?= $post->getTitle() ?></h4>
    <p>Contenu : <?= $post->getContent() ?></p>
    <p>id du poste : <?= $post->getPostId() ?></p>
    <?php if (($_SESSION["User"]["userId"] === $post->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
        <form action="/home/delete" method="POST">
            <button>Delete</button>
            <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
            <input type="hidden" name="postUser" value="<?= $post->getUserId() ?>">
        </form>
    <?php endif ?>
    <form action="/home/post/<?= $post->getPostId() ?>" method="GET"><button>En savoir plus</button></form>
    <hr>
<?php endforeach ?>
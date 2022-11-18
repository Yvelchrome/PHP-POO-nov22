<?php
$idUser = $_SESSION["User"]["userId"];
$nameUser = $_SESSION["User"]["username"];
/** @var App\Entity\Post $post */
foreach ($users as $user) {
    if ($post->getUserId() === $user->getUserId()) {
        echo "Je suis le créateur " . $postUser = $user->getUsername();
    }
}
?>
<h1>hahahaah</h1>
<a href="/home">home</a>
<h3>Créateur : <?= $postUser ?></h3>
<p> Créez : <?= $post->getCreationDate() ?></p>
<h4>Titre : <?= $post->getTitle() ?></h4>
<p>Contenu : <?= $post->getContent() ?></p>
<p>Id du poste : <?= $post->getPostId() ?></p>
<?php if (($_SESSION["User"]["userId"] === $post->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
    <form action="/home/delete" method="POST"><button>Delete</button>
        <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
        <input type="hidden" name="postUser" value="<?= $post->getUserId() ?>">
    </form>
    <form method="POST"><button>Modify</button>
        <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
        <label for="title">Titre : </label>
        <input type="text" name="title" value="<?= $post->getTitle() ?>">
        <label for="content">Contenu : </label>
        <input type="text" name="content" value="<?= $post->getContent() ?>">
    </form>
<?php endif ?>
<hr>
<form action="comment" method="POST">
    <input type="hidden" name="userId" value="<?= $idUser ?>">
    <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?= $nameUser ?>" disabled>
    <label for="comment">Commentaire</label>
    <input type="text" name="comment">
    <button>envoyer</button>
</form>
<hr>
<?php
/** @var App\Entity\Comment[] $comments */
foreach ($comments as $comment) : ?>
    <?php if ($post->getPostId() === $comment->getPostId()) : ?>
        <h3>celui qui a comment : <?= $comment->getUsername() ?></h3>
        <h1>le comment : <?= $comment->getContent() ?></h1>
    <?php endif; ?>
<?php endforeach ?>
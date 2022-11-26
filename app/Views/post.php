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
        <input type="text" name="title" value="<?= $post->getTitle() ?>" required>
        <label for="content">Contenu : </label>
        <input type="text" name="content" value="<?= $post->getContent() ?>" required>
    </form>

    <hr>
<?php endif ?>
<form action="comment" method="POST">
    <input type="hidden" name="userId" value="<?= $idUser ?>">
    <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?= $nameUser ?>" disabled>
    <label for="comment">Commentaire</label>
    <input type="text" name="comment" required>
    <button>envoyer</button>
</form>
<hr>
<?php
/** @var App\Entity\Comment[] $comments */
foreach ($comments as $comment) : ?>
    <?php if ($post->getPostId() === $comment->getPostId()) : ?>
        <h2>l'id du comment : <?= $comment->getCommentId() ?>, <?= $comment->getCreationDate() ?></h2>
        <h3>celui qui a comment : <?= $comment->getUsername() ?></h3>
        <h1>le comment : <?= $comment->getContent() ?></h1>
        <form action=""><label for="child">Comment</label>
            <input type="text" name="child">
            <button>envoyer</button>
        </form>
        <?php if (($_SESSION["User"]["userId"] === $comment->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
            <form action="/home/delete/comment" method="POST"><button>Delete</button>
                <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
                <input type="hidden" name="commentId" value="<?= $comment->getCommentId() ?>">
                <input type="hidden" name="commentUser" value="<?= $comment->getUserId() ?>">
            </form>
        <?php endif ?>
    <?php endif; ?>
<?php endforeach; ?>
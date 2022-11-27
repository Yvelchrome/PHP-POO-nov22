<?php include 'header.php'; ?>
<?php

use App\Entity\Comment;

$idUser = $_SESSION["User"]["userId"];
$nameUser = $_SESSION["User"]["username"];
/** @var App\Entity\Post $post */
foreach ($users as $user) {
    if ($post->getUserId() === $user->getUserId()) {
        $postUser = $user->getUsername();
    }
}
?>
<div class="post-single">
    <div class="post-single-item">
        <img src="/src/assets/images/<?= $post->getImage() ?>" alt="">
        <p class="created"> Crée le : <?= $post->getCreationDate() ?> | Par : <?= $postUser ?></p>
        <h3>Titre : <?= $post->getTitle() ?></h3>
        <p>Contenu : <?= $post->getContent() ?></p>
    </div>
    <div class="actions">
        <?php if (($_SESSION["User"]["userId"] === $post->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
            <form method="POST">
                <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
                <label for="title">Titre : </label>
                <input type="text" name="title" value="<?= $post->getTitle() ?>" required>
                <label for="content">Contenu : </label>
                <input type="text" name="content" value="<?= $post->getContent() ?>" required>
                <input class="modify" type="submit" value="Modify"></input>
            </form>
            <form action="/home/delete" method="POST">
                <input class="delete" type="submit" value="Delete"></input>
                <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
                <input type="hidden" name="postUser" value="<?= $post->getUserId() ?>">
            </form>
        <?php endif ?>
    </div>
    <div class="comment">
        <form action="comment" method="POST">
            <input type="hidden" name="userId" value="<?= $idUser ?>">
            <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?= $nameUser ?>" disabled>
            <label for="comment">Commentaire</label>
            <input type="text" name="comment" required>
            <input class="submit" type="submit" value="Envoyer">
        </form>
    </div>
</div>
<?php
/** @var App\Entity\Comment[] $comments */
/** @var App\Entity\Child[] $childComments */
foreach ($comments as $comment) : ?>
    <?php if ($post->getPostId() === $comment->getPostId()) : ?>
        <h2>l'id du comment : <?= $comment->getCommentId() ?>, <?= $comment->getCreationDate() ?></h2>
        <h3>celui qui a comment : <?= $comment->getUsername() ?></h3>
        <h1>le comment : <?= $comment->getContent() ?></h1>
        <?php if (($_SESSION["User"]["userId"] === $comment->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
            <form action="/home/delete/comment" method="POST"><button>Delete</button>
                <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
                <input type="hidden" name="commentId" value="<?= $comment->getCommentId() ?>">
                <input type="hidden" name="commentUser" value="<?= $comment->getUserId() ?>">
            </form>
        <?php endif ?>
        <form action="comment/child" method="POST">
            <label>Comment
                <input class="comment-input" type="text" name="content" required>
            </label>
            <input type="hidden" name="userId" value="<?= $idUser ?>">
            <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
            <input type="hidden" name="username" value="<?= $nameUser ?>">
            <input type="hidden" name="commentId" value="<?= $comment->getCommentId() ?>">
            <button>envoyer</button>
        </form>
        <?php foreach ($childComments as $childComment) : ?>
            <?php if ($comment->getCommentId() === $childComment->getCommentId()) : ?>
                <div style="margin-left: 40px;">
                    <h3>id du comment : <?= $comment->getCommentId() ?></h3>
                    <h4> id du child : <?= $childComment->getChildId() ?></h4>
                    <p>contenu du child : <?= $childComment->getContent() ?></p>
                    <?php if (($_SESSION["User"]["userId"] === $childComment->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
                        <form action="/home/delete/comment/child" method="POST"><button>Delete</button>
                            <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
                            <input type="hidden" name="childId" value="<?= $childComment->getChildId() ?>">
                        </form>
                    <?php endif ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>
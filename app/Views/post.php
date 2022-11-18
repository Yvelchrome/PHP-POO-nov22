<?php

/** @var App\Entity\Post $post */
foreach ($users as $user) {
    if ($post->getUserId() === $user->getUserId()) {
        echo "Je suis le créateur " . $postUser = $user->getUsername();
    }
}
?>
<h1>hahahaah</h1>
<a href="../home">home</a>
<h3>Créateur : <?= $postUser ?></h3>
<p> Créez : <?= $post->getCreationDate() ?></p>
<h4>Titre : <?= $post->getTitle() ?></h4>
<p>Contenu : <?= $post->getContent() ?></p>
<p>Id du poste : <?= $post->getPostId() ?></p>
<?php if (($_SESSION["User"]["userId"] === $post->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
    <form action="../home/delete" method="POST"><button>Delete</button>
        <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
        <input type="hidden" name="postUser" value="<?= $post->getUserId() ?>">
    </form>
    <form method="POST"><button>Modify</button>
        <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
        <input type="text" name="title" value="<?= $post->getTitle() ?>">
        <input type="text" name="content" value="<?= $post->getContent() ?>">
    </form>
<?php endif ?>
<hr>
<?php include 'header.php'; ?>
<div class="home">
    <h2>Bienvenue <?= $_SESSION["User"]["username"] ?>!</h2>
    <form class="form" method="POST" enctype="multipart/form-data">
        <label class="form-item">Titre
            <input type="text" name="title" required>
        </label>
        <label class="form-item">Créez un nouveau post
            <textarea name="content" id="content" cols="30" rows="3" required></textarea>
        </label>
        <label class="form-item">Image
            <input type="file" name="image" accept="image/jpeg, image/png, image/gif, image/jpg" value="">
        </label>
        <input type="submit" value="Envoyez">
    </form>

    <div class="posts">
        <?php
        /** @var App\Entity\Post[] $posts */
        /** @var App\Entity\User[] $users */
        foreach ($posts as $post) :
            foreach ($users as $user) {
                if ($user->getUserId() === $post->getUserId()) {
                    $postUser = $user->getUsername();
                }
            };
        ?><div class="posts-item">
                <img src="./src/assets/images/<?= $post->getImage() ?>" alt="">
                <p class="created"> Crée le : <?= $post->getCreationDate() ?> | Par : <?= $postUser ?></p>
                <h3 class="title">Titre : <?= $post->getTitle() ?></h3>
                <p class="content"><?= $post->getContent() ?></p>
                <div class="actions">
                    <a class="know-more" href="/home/post/<?= $post->getPostId() ?>">En savoir plus</a>
                    <?php if (($_SESSION["User"]["userId"] === $post->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
                        <form action="/home/delete" method="POST">
                            <input type="submit" value="Delete"></input>
                            <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
                            <input type="hidden" name="postUser" value="<?= $post->getUserId() ?>">
                        </form>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("select * from Post ORDER BY creationDate DESC");

        $posts = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }

        return $posts;
    }

    public function addPost(Post $post): ?Post
    {
        $insert = $this->pdo->prepare("INSERT INTO Post (userId,title,content) VALUES (:userId,:title,:content)");
        $insert->bindValue("userId", $post->getUserId(), \PDO::PARAM_INT);
        $insert->bindValue("title", $post->getTitle(), \PDO::PARAM_STR);
        $insert->bindValue("content", $post->getContent(), \PDO::PARAM_STR);
        $insert->execute();

        return $post;
    }

    public function deletePost(int $postId): void
    {
        $delete = $this->pdo->prepare("DELETE FROM Post WHERE postId = :postId");
        $delete->bindValue("postId", $postId, \PDO::PARAM_INT);
        $delete->execute();
    }
    public function getPost(int $postId): ?Post
    {
        $search = $this->pdo->prepare("SELECT * FROM Post WHERE postId = :postId");
        $search->bindValue("postId", $postId, \PDO::PARAM_INT);
        $search->execute();
        $onePost = $search->fetch(\PDO::FETCH_ASSOC);
        if ($onePost) {
            return new Post($onePost);
        }
        return null;
    }

    public function modifyPost(string $title, string $content, int $postId)
    {
        $modify = $this->pdo->prepare("UPDATE Post SET title = :title, content = :content WHERE postId = :postId");
        $modify->bindValue("title", $title, \PDO::PARAM_STR);
        $modify->bindValue("content", $content, \PDO::PARAM_STR);
        $modify->bindValue("postId", $postId, \PDO::PARAM_INT);
        $modify->execute();
    }
}

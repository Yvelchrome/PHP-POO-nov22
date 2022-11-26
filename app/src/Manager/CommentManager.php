<?php

namespace App\Manager;

use App\Entity\Comment;
use PDO;

class CommentManager extends BaseManager
{
    /** 
     *   @return Comment[] 
     */
    public function getAllComments(): array
    {
        $query = $this->pdo->query("select * from Comment ORDER BY creationDate DESC");

        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    public function addComment(Comment $comment)
    {
        $insert = $this->pdo->prepare("INSERT INTO Comment (userId, postId, content, username) VALUE (:userId, :postId, :content, :username)");
        $insert->bindValue("userId", $comment->getUserId(), PDO::PARAM_INT);
        $insert->bindValue("postId", $comment->getPostId(), PDO::PARAM_INT);
        $insert->bindValue("content", $comment->getContent(), PDO::PARAM_STR);
        $insert->bindValue("username", $comment->getUsername(), PDO::PARAM_STR);
        $insert->execute();
    }

    public function addChildComment(Comment $comment)
    {
        $insert = $this->pdo->prepare("INSERT INTO Comment (userId, postId, content, username) VALUE (:userId, :postId, :content, :username)");
        $insert->bindValue("userId", $comment->getUserId(), PDO::PARAM_INT);
        $insert->bindValue("postId", $comment->getPostId(), PDO::PARAM_INT);
        $insert->bindValue("content", $comment->getContent(), PDO::PARAM_STR);
        $insert->bindValue("username", $comment->getUsername(), PDO::PARAM_STR);
        $insert->execute();
    }

    public function deleteComment(int $commentId): void
    {
        $delete = $this->pdo->prepare("DELETE FROM Comment WHERE commentId = :commentId");
        $delete->bindValue("commentId", $commentId, \PDO::PARAM_INT);
        $delete->execute();
    }
}

<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager
{
    /** 
     *   @return Comment[] 
     */
    public function getAllComments(): array
    {
        $query = $this->pdo->query("select * from Comment");

        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }
}

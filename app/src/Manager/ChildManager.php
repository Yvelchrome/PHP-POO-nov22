<?php 

namespace App\Manager;

use App\Entity\Child;
use PDO;

class ChildManager extends BaseManager {
        /**
     * @return Child[]
     */
    public function getAllChildComments(): array
    {
        $query = $this->pdo->query("select * from Child ORDER BY creationDate DESC");

        $childs = [];

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $childs[] = new Child($data);
        }

        return $childs;
    }

    public function addChildComment(Child $child)
    {
        $insert = $this->pdo->prepare("INSERT INTO Child (userId, postId, content, username, commentId) VALUE (:userId, :postId, :content, :username, :commentId)");
        $insert->bindValue("userId", $child->getUserId(), PDO::PARAM_INT);
        $insert->bindValue("postId", $child->getPostId(), PDO::PARAM_INT);
        $insert->bindValue("content", $child->getContent(), PDO::PARAM_STR);
        $insert->bindValue("username", $child->getUsername(), PDO::PARAM_STR);
        $insert->bindValue("commentId", $child->getCommentId(), PDO::PARAM_STR);
        $insert->execute();
    }

}
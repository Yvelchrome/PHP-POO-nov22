<?php

namespace App\Controller;

use App\Entity\Child;
use App\Factory\PDOFactory;
use App\Manager\ChildManager;
use App\Route\Route;

class ChildController extends AbstractController
{
    #[Route("/home/post/comment/child", name: "childComment", methods: ["POST"])]
    public function childComment()
    {
        session_start();
        $childComment = new Child();
        $postId = $_POST["postId"];
        $childComment->setUserId($_SESSION["User"]["userId"]);
        $childComment->setPostId($_POST["postId"]);
        $childComment->setContent($_POST["content"]);
        $childComment->setUsername($_SESSION["User"]["username"]);
        $childComment->setCommentId($_POST["commentId"]);
        $manager = new ChildManager(new PDOFactory());
        $manager->addChildComment($childComment);
        header("Location: /home/post/${postId}");
    }



    #[Route('/home/delete/comment/child', name: "delete", methods: ["POST"])]
    public function deleteChild()
    {
        $postId = $_POST["postId"];
        $deleteManager = new ChildManager(new PDOFactory());
        $commentChildDelete = new Child();
        $deleteManager->deleteChildComment($commentChildDelete->setChildId($_POST["childId"]));
        header("Location: /home/post/${postId}");
    }
}

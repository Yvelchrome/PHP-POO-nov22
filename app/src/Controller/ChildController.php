<?php

namespace App\Controller;

use App\Entity\Child;
use App\Factory\PDOFactory;
use App\Manager\ChildManager;
use App\Route\Route;

class ChildController extends AbstractController
{
    #[Route("/home/post/comment/child", name: "childComment", methods: ["POST"])]

    public function childComment(){
        session_start();
        $childComment = new Child();
        $userId = $_SESSION["User"]["userId"];
        $postId = $_POST["postId"];
        $content = $_POST["content"];
        $username = $_SESSION["User"]["username"];
        $commentId = $_POST["commentId"];
        $childComment->setUserId($userId);
        $childComment->setPostId($postId);
        $childComment->setContent($content);
        $childComment->setUsername($username);
        $childComment->setCommentId($commentId);
        $manager = new ChildManager(new PDOFactory());
        $manager->addChildComment($childComment);
        header("Location: /home/post/${postId}");

    }
}

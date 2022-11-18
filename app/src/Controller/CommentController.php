<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Factory\PDOFactory;
use App\Manager\CommentManager;
use App\Route\Route;

class CommentController extends AbstractController
{
    #[Route("/home/post/comment", name: "comment", methods: ["POST"])]
    public function commenting()
    {
        session_start();
        $newComment = new Comment();
        $userId = $_SESSION["User"]["userId"];
        $postId = $_POST["postId"];
        $comment = $_POST["comment"];
        $username = $_SESSION["User"]["username"];
        $newComment->setUserId($userId);
        $newComment->setPostId($postId);
        $newComment->setContent($comment);
        $newComment->setUsername($username);
        $manager = new CommentManager(new PDOFactory());
        $com = $manager->addComment($newComment);
        header("Location: /home/post/${postId}");
    }
}

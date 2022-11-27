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
        $postId = $_POST["postId"];
        $newComment->setUserId($_SESSION["User"]["userId"]);
        $newComment->setPostId($_POST["postId"]);
        $newComment->setContent($_POST["comment"]);
        $newComment->setUsername($_SESSION["User"]["username"]);
        $manager = new CommentManager(new PDOFactory());
        $manager->addComment($newComment);
        header("Location: /home/post/${postId}");
    }

    #[Route('/home/delete/comment', name: "delete", methods: ["POST"])]
    public function deletePost()
    {
        $postId = $_POST["postId"];
        $deleteManager = new CommentManager(new PDOFactory());
        $commentDelete = new Comment();
        $deleteManager->deleteComment($commentDelete->setCommentId($_POST["commentId"]));
        header("Location: /home/post/${postId}");
    }
}

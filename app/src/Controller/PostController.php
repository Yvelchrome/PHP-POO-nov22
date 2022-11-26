<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\CommentManager;
use App\Manager\PostManager;
use App\Route\Route;
use App\Manager\UserManager;

class PostController extends AbstractController
{
    #[Route("/home/post/{id}", name: "post", methods: ["GET"])]
    public function post(int $id)
    {
        session_start();
        if (isset($_SESSION["User"])) {
            $allUser = new UserManager(new PDOFactory());
            $users = $allUser->getAllUsers();
            $manager = new PostManager(new PDOFactory());
            $onePost = $manager->getPost($id);
            $comment = new CommentManager(new PDOFactory());
            $allComment = $comment->getAllComments();
            $this->render("post.php", ["post" => $onePost, "users" => $users, "comments" => $allComment], "Super Post");
        } else {
            header("Location: /login");
        }
    }

    #[Route("/home/post/{id}", name: "modify", methods: ["POST"])]
    public function modifyP(int $id)
    {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $post = new PostManager(new PDOFactory());
        $modify = $post->modifyPost($title, $content, $id);
        header("Location: /home/post/${id}");
    }

    #[Route('/home/delete', name: "delete", methods: ["POST"])]
    public function deletePost()
    {
        $postId = $_POST["postId"];
        $deleteManager = new PostManager(new PDOFactory());
        $delete = $deleteManager->deletePost($postId);
        header("Location: /home");
    }
}

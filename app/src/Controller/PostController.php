<?php

namespace App\Controller;

use App\Entity\Post;
use App\Factory\PDOFactory;
use App\Manager\ChildManager;
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
            $childComment = new ChildManager(new PDOFactory);
            $allChildComment = $childComment->getAllChildComments();
            $this->render("post.php", ["post" => $onePost, "users" => $users, "comments" => $allComment, "childComments" => $allChildComment], "Super Post");
        } else {
            header("Location: /login");
        }
    }

    #[Route("/home/post/{id}", name: "modify", methods: ["POST"])]
    public function modifyP(int $id)
    {
        $postModify = new Post();
        $postModify->setTitle($_POST["title"]);
        $postModify->setContent($_POST["content"]);
        $postModify->setPostId($id);
        $post = new PostManager(new PDOFactory());
        $post->modifyPost($postModify);
        header("Location: /home/post/${id}");
    }

    #[Route('/home/delete', name: "delete", methods: ["POST"])]
    public function deletePost()
    {
        $deleteManager = new PostManager(new PDOFactory());
        $postDelete = new Post();
        $deleteManager->deletePost($postDelete->setPostId($_POST["postId"]));
        header("Location: /home");
    }
}

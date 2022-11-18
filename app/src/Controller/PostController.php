<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Route\Route;
use App\Manager\UserManager;

class PostController extends AbstractController
{
    #[Route("/post/{id}", name: "post", methods: ["GET"])]
    public function post(int $id)
    {
        session_start();
        $allUser = new UserManager(new PDOFactory());
        $users = $allUser->getAllUsers();
        $manager = new PostManager(new PDOFactory());
        $onePost = $manager->getPost($id);
        var_dump("toto", $id);
        $this->render("post.php", ["post" => $onePost, "users" => $users], "Super Post");
    }

    #[Route("/post/{id}", name: "modify", methods: ["POST"])]
    public function modifyP(int $id)
    {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $post = new PostManager(new PDOFactory());
        $modify = $post->modifyPost($title, $content, $id);
        header("Location: /post/${id}");
    }
}

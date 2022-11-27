<?php

namespace App\Controller;

use App\Entity\Post;
use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Route\Route;
use App\Manager\UserManager;

class HomeController extends AbstractController
{
    #[Route('/home', name: "homepage", methods: ["GET"])]
    public function home()
    {
        session_start();
        if (isset($_SESSION["User"])) {
            $manager = new PostManager(new PDOFactory());
            $posts = $manager->getAllPosts();
            $allUser = new UserManager(new PDOFactory());
            $users = $allUser->getAllUsers();
            $this->render("home.php", [
                "posts" => $posts,
                "users" => $users
            ], "Page d'accueil");
        } else {
            header("Location: /login");
        }
    }

    #[Route("/home", name: "posting", methods: ["POST"])]
    public function posting()
    {
        session_start();
        $newpost = new Post();
        $newpost->setUserId($_SESSION["User"]["userId"]);
        $newpost->setTitle($_POST["title"]);
        $newpost->setContent($_POST["content"]);
        $manager = new PostManager(new PDOFactory());
        $manager->addPost($newpost);
        $postManager = new PostManager(new PDOFactory());
        $posts = $postManager->getAllPosts();
        $allUser = new UserManager(new PDOFactory());
        $users = $allUser->getAllUsers();
        $this->render("home.php", ["posts" => $posts, "users" => $users], "Page d'accueil");
    }
}

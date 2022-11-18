<?php

namespace App\Controller;

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

        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();
        $allUser = new UserManager(new PDOFactory());
        $users = $allUser->getAllUsers();
        $this->render("home.php", [
            "posts" => $posts,
            "users" => $users
        ], "connecté");
    }


    #[Route("/home", name: "posting", methods: ["POST"])]
    public function posting()
    {
        session_start();
        var_dump($_SESSION["User"]["userId"]);
        $userId = $_SESSION["User"]["userId"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        var_dump($title, $content);
        $manager = new PostManager(new PDOFactory());
        $newPost = $manager->addPost($userId, $title, $content);


        $postManager = new PostManager(new PDOFactory());
        $posts = $postManager->getAllPosts();
        $allUser = new UserManager(new PDOFactory());
        $users = $allUser->getAllUsers();
        $this->render("home.php", ["posts" => $posts, "users" => $users], "Page d'accueil");
    }
    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */
    #[Route('/home/delete', name: "francis", methods: ["POST"])]
    public function deletePost()
    {
        $postId = $_POST["postId"];
        $deleteManager = new PostManager(new PDOFactory());
        $delete = $deleteManager->deletePost($postId);
        header("Location: /home");
    }
}

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
            ], "connecté");
        } else {
            header("Location: /login");
        }
    }

    #[Route("/home", name: "posting", methods: ["POST"])]
    public function posting()
    {
        session_start();
        $newpost = new Post();

        var_dump($_SESSION["User"]["userId"]);
        $userId = $_SESSION["User"]["userId"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $newpost->setUserId($userId);
        $newpost->setTitle($title);
        $newpost->setContent($content);
        var_dump($title, $content);
        $manager = new PostManager(new PDOFactory());
        $newPost = $manager->addPost($newpost);
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
    #[Route('/home/delete', name: "delete", methods: ["POST"])]
    public function deletePost()
    {
        $postId = $_POST["postId"];
        $deleteManager = new PostManager(new PDOFactory());
        $delete = $deleteManager->deletePost($postId);
        header("Location: /home");
    }
}

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


        $userId = $_SESSION["User"]["userId"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $filename = $_FILES["image"]["name"];
        /* $filetmpname = $_FILES["image"]["tmp_name"];
        $folder = '/app/src/assets/images/';
        move_uploaded_file($filetmpname, $folder . $filename); */
        var_dump($filename);

        $newpost->setUserId($userId);
        $newpost->setTitle($title);
        $newpost->setContent($content);
        $newpost->setImage($filename);
        var_dump($title, $content);
        $manager = new PostManager(new PDOFactory());
        $manager->addPost($newpost);
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
}

<?php

namespace App\Controller;

use App\Route\Route;
use App\Manager\UserManager;
use App\Factory\PDOFactory;

class LoginController extends AbstractController
{
    #[Route("/login", name: "login", methods: ["GET"])]
    public function login()
    {
        $this->render("login.php", [], "Connexion");
    }

    #[Route("/login", name: "login", methods: ["POST"])]
    public function executeLogin()
    {
        session_start();
        $username = $_POST["username"];
        $password = hash("sha512", $_POST["password"]);
        $manager = new UserManager(new PDOFactory());
        $user = $manager->checkUser($username, $password);
        if (!$user) {
            $this->render("login.php", ['error' => 'le nom d\'utilisateur ou le mot de passe est incorrect'], "mdp or user invalide");
            exit;
        }
        header("Location: /home");
}
}

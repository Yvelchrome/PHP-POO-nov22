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
    }
}

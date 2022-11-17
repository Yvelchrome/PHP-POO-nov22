<?php

namespace App\Controller;

use App\Route\Route;

class LoginController extends AbstractController
{
    #[Route("/login", name: "login", methods: ["GET"])]
    public function login()
    {
        $this->render("login.php", [], "Connexion");
    }
}

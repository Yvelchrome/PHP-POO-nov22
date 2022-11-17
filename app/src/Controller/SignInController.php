<?php

namespace App\Controller;

use App\Route\Route;

class SignInController extends AbstractController
{
    #[Route("/signIn", name: "signin", methods: ["GET"])]
    public function signIn()
    {
        $this->render("signIn.php", [], "test connexion");
    }
}

<?php

namespace App\Controller;

class SignInController extends AbstractController
{
    public function signIn()
    {
        $this->render("signin.php", [], "test connexion");
    }
}

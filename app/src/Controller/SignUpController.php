<?php

namespace App\Controller;

class SignUpController extends AbstractController
{
    public function signUp()
    {
        $this->render("signUp.php", [], "test inscription");
    }
}

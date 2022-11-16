<?php

require_once "vendor/autoload.php";

$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");
var_dump($url);
switch ($url) {
    case "/":
        $controller = new \App\Controller\SignUpController();
        $controller->signUp();
        break;
    case "/signin":
        $controller = new \App\Controller\SignInController();
        $controller->signIn();
        break;
    case "/toto":
        $controller = new \App\Controller\TotoController();
        $controller->toto();
    default:
}

<?php

require_once "vendor/autoload.php";

$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");

switch ($url) {
    case "/":
        require_once __DIR__ . "/Views/head.php";
        require_once __DIR__ . "/Views/SignUp.php";
        require_once __DIR__ . "/Views/footer.php";
        break;
    case "/login":
        require_once __DIR__ . "/Views/head.php";
        require_once __DIR__ . "/Views/SignIn.php";
        require_once __DIR__ . "/Views/footer.php";
        break;
}

<?php

require_once "vendor/autoload.php";

$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");

switch ($url) {
    case "/":
        require_once __DIR__ . "/Views/SignIn.php";
        break;
}

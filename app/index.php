<?php

use App\Route\Route;

require_once "vendor/autoload.php";

$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");
var_dump($url);
// switch ($url) {
//     case "/":
//         $controller = new \App\Controller\SignUpController();
//         $controller->signUp();
//         break;
//     case "/signIn":
//         $controller = new \App\Controller\SignInController();
//         $controller->signIn();
//         break;
//     default:
// }

$controllerDir = dirname(__FILE__) . "/src/Controller";
$dirs = scandir($controllerDir);
// var_dump($dirs);
$controllers = [];

foreach ($dirs as $dir) {
    if ($dir === "." || $dir === "..") {
        continue;
    }
    $controllers[] = "App\\Controller\\" . pathinfo($controllerDir . DIRECTORY_SEPARATOR . $dir)["filename"];
}
// var_dump($controllers);
$routesObj = [];

foreach ($controllers as $controller) {
    $reflection = new ReflectionClass($controller);
    foreach ($reflection->getMethods() as $method) {
        foreach ($method->getAttributes() as $attribute) {

            var_dump("Attribute", $attribute->getName());

            /** @var Route $route */
            $route = $attribute->newInstance();
            $route->setController($controller)
                ->setAction($method->getName());
            $routesObj[] = $route;
        }
    }
}

foreach ($routesObj as $route) {

    if (!$route->match($url) || !in_array($_SERVER["REQUEST_METHOD"], $route->getMethods())) {
        continue;
    }
    $controllerClassName = $route->getController();

    $action = $route->getAction();

    $params = $route->mergeParams($url);
    new $controllerClassName($action, $params);
    exit();
}

echo "NO MATCH";
die;

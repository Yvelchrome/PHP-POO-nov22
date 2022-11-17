<?php

namespace App\Controller;

abstract class AbstractController
{

    public function __construct(string $action, array $params = [])
    {
        if (!is_callable([$this, $action])) {
            throw new \RuntimeException("La méthode $action n'est pas disponible dans le controller");
        }
        call_user_func_array([$this, $action], $params);
    }


    public function render(string $view, array $args = [], string $title = "Doc")
    {
        $viewLoaded = dirname(__DIR__, 2) . "/Views/" . $view;
        $base = dirname(__DIR__, 2) . "/Views/base.php";
        var_dump($viewLoaded);
        ob_start();
        foreach ($args as $key => $value) {
            ${$key} = $value;
        }
        require_once $viewLoaded;

        $_pageContent = ob_get_clean();
        $_pageTitle = $title;

        require_once $base;

        exit;
    }
}

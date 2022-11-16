<?php

namespace App\Controller;

abstract class AbstractController
{
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

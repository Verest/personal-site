<?php 

class PHPSimpleFramework
{
    public static function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestURI = $_SERVER['REQUEST_URI'];
        $basePath = dirname(__FILE__, 2); //todo: make global helper

        $routes = include("$basePath/routes/web.php");

        $action = $routes[$method][$requestURI] ?? false;

        if ($action) {
            self::renderView($action, $basePath);
        } else {
            if (is_readable($errorView = "$basePath/view/error/404.php")) {
                include($errorView);
            } else {
                die("404 not found");
            }
        }
    }

    private static function renderView($action, $basePath)
    {
        [$controller, $method] = explode('@', $action);

        $viewData = (new $controller)->$method();
        if (is_string($viewData)) {
            $args = [];
            $pathToView = $viewData;
        } else {
            //todo: handle potential crashing if not returned correctly
            $pathToView = $viewData['view'];
            $args = $viewData['args'] ?? [];
        }

        foreach ($args as $name => $value) {
            $$name = $value;
        }

        include("$basePath/view/$pathToView");
    }
}
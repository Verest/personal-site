<?php 

class PHPSimpleFramework
{
    public static function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestURI = $_SERVER['REQUEST_URI'];

        $routes = include(getBasePath("routes/web.php"));

        $action = $routes[$method][$requestURI] ?? false;

        if ($action) {
            self::renderView($action);
        } else {
            if (is_readable($errorView = getViewPath("error/404.php"))) {
                include($errorView);
            } else {
                die("404 not found");
            }
        }
    }

    private static function renderView($action)
    {
        $viewPath = getViewPath();
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

        include(getViewPath($pathToView));
    }
}
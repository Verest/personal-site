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
        [$viewPath, $viewArgs] = self::extractViewDataFromAction($action);

        foreach ($viewArgs as $name => $value) {
            $$name = $value;
        }

        include(getViewPath($viewPath));
    }

    private static function extractViewDataFromAction($action)
    {
        [$controller, $method] = explode('@', $action);

        $viewData = (new $controller)->$method();
        if (is_string($viewData)) {
            $viewArgs = [];
            $viewPath = $viewData;
        } else {
            //todo: handle potential crashing if controller not configured correctly
            $viewPath = $viewData['view'];
            $viewArgs = $viewData['args'] ?? [];
        }

        return [$viewPath, $viewArgs];
    }
}
<?php 

namespace Framework;

class PHPSimpleFramework
{
    public static function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestURI = $_SERVER['REQUEST_URI'];
        $routes = include(getBasePath("routes/web.php"));

        $action = $routes[$method][$requestURI] ?? false;

        if ($action) {
            self::sendResponse($action);
        } else {
            if (is_readable($errorView = getViewPath("error/404.php"))) {
                include($errorView);
            } else {
                die("404 not found");
            }
        }
    }

    private static function sendResponse($action)
    {
        [$controller, $method] = explode('@', $action);

        //todo: error handling
        (new $controller)->$method()->send();
    }
}

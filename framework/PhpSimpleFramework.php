<?php 

class PHPSimpleFramework
{
    public static function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestURI = $_SERVER['REQUEST_URI'];

        $routes = include(dirname(__FILE__, 2) . '/routes/web.php');

        $action = $routes[$method][$requestURI] ?? false;

        if ($action) {
            [$controller, $method] = explode('@', $action);

            echo (new $controller)->$method();
        } else {
            echo "route not found";
        }
    }
}
<?php 

class PHPSimpleFramework
{
    public static function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestURI = $_SERVER['REQUEST_URI'];
        $basePath = dirname(__FILE__, 2);

        $routes = include("$basePath/routes/web.php");

        $action = $routes[$method][$requestURI] ?? false;

        if ($action) {
            [$controller, $method] = explode('@', $action);

            $pathToView = (new $controller)->$method();
            echo(file_get_contents("$basePath/view/$pathToView"));
        } else {
            echo "route not found";
        }
    }
}
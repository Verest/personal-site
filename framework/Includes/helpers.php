<?php

use Framework\Response;

if (! function_exists('getBasePath')) {
    function getBasePath($path = '')
    {
        //todo: note DIRECTORY_SEPARATOR might vary
        ltrim($path, '/');
        if ($path) {
            $path = "/$path";
        }
    
        return dirname(__FILE__, 3) . $path;
    }
}

if (! function_exists('getViewPath')) {
    function getViewPath($path = '')
    {
        //todo: note DIRECTORY_SEPARATOR might vary
        ltrim($path, '/');
        if ($path) {
            $path = "/$path";
        }

        return dirname(__FILE__, 3) . "/views$path";
    }
}

if (! function_exists('response')) {
    function response($type, $data)
    {
       return (new Response($type, $data))->get();
    }
}

if (! function_exists('config')) {
    function config($name)
    {
        if (is_readable($configFile = getBasePath("config/$name.php"))) {
            return include($configFile);
        }
    
        //todo: create custom exception and throw here.
        return [];
    }
}
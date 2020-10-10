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
    
        return dirname(__FILE__, 2) . $path;
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

        return dirname(__FILE__, 2) . "/views$path";
    }
}


if (! function_exists('response')) {
    function response($type, $data)
    {
       return (new Response($type, $data))->get();
    }
}
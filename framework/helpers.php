<?php

if (! function_exists('getBasePath')) {
    function getBasePath($path = '')
    {
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
        ltrim($path, '/');
        if ($path) {
            $path = "/$path";
        }

        return dirname(__FILE__, 2) . "/view$path";
    }
}
<?php 

namespace App\Controllers;

class MainController
{
    public function index()
    {
        return [
            "view" => "main/index.php",
            "args" => [
                "testArg" => "trying to echo this!"
            ]
        ];
    }
}
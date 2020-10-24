<?php 

namespace App\Controllers;

use App\Models\Model;

class MainController
{
    public function index()
    {
        $test = Model::all();

        return response('view', [
            "view" => "main/index.php",
            "args" => [
                "defaultPage" => "This is the default page."
            ]
        ]);
    }
}

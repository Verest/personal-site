<?php 

namespace App\Controllers;

use App\Models\Model;

class MainController
{
    public function index()
    {
        return response('view', "main/index.php");
    }
}

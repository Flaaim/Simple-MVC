<?php

namespace App\Controllers;

use App\Layouts\Layout;

class DocumentController {

    public function test($param){
        echo "test".$param;
    }

    public function index()
    {
        return new Layout('Test title', 'views/test.tpl.php', 'layout.tpl.php');
    }
    public function add(){
        var_dump($_POST);
    }
}


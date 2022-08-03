<?php

namespace App\Controllers;

use App\Layouts\Layout;

class DocumentController {

    public function test(){
        echo "test";
    }

    public function index()
    {

        //echo "Hello world";
        return new Layout('Test title', 'views/test.tpl.php', 'layout.tpl.php');
        
    }
}


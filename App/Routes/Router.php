<?php

namespace App\Routes;

use App\Layouts\Layout;
use App\Controllers\DefaultController;
use App\Controllers\DocumentController;

class Router {
    public function add($route, $controller, $method){
        $route = str_replace('/', '', $route);
        $reqUri = str_replace('/', '', $_SERVER['REQUEST_URI']);

        if($route == $reqUri){
            $controller->$method();
            exit();
        }
        
    }

    public function notFound($controller){
        $controller->notFound();
        exit();
    }
}


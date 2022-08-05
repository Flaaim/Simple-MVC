<?php

namespace App\Routes;

use App\Layouts\Layout;
use App\Controllers\DefaultController;
use App\Controllers\DocumentController;

class Router {
    private function simpleRoute($route, $controller, $method){
        if(!empty($_SERVER['REQUEST_URI'])){
            $route = preg_replace('#^(\/)|(\/)$#', '', $route);
            $reqUri = preg_replace('#^(\/)|(\/)$#', '', $_SERVER['REQUEST_URI']);    
        } else{
            $reqUri = '/';
        }
        
        if($route == $reqUri){
            $params = [];
            $controller->$method();
            exit();
        }
    }

    public function add($route, $controller, $method){
        $params = [];
        $paramKey = [];
        preg_match_all('#\{([A-z]+)\}#', $route, $matches);
        if(empty($matches[0])){
            $this->simpleRoute($route, $controller, $method);
        }
        
        foreach($matches[1] as $value){
            $paramKey[] = $value;
        }
        if(!empty($_SERVER['REQUEST_URI'])){
            $route = preg_replace('#^(\/)|(\/)$#', '', $route);
            $reqUri = preg_replace('#^(\/)|(\/)$#', '', $_SERVER['REQUEST_URI']);    
        } else{
            $reqUri = '/';
        }
        
        $uri = explode('/', $route);
        
        $indexNum = [];
        foreach($uri as $key => $value){
            if(preg_match('#{.*?}#', $value)){
                $indexNum[] = $key;
            }
        }
        $reqUri = explode("/", $reqUri);
        foreach($indexNum as $key => $index){
            if(empty($reqUri[$index])){
                return;
            }

            $params[$paramKey[$key]] = $reqUri[$index];
            $reqUri[$index] = "{.*}";
        }
        $reqUri = implode("/",$reqUri);
        if(preg_match("#$reqUri#", $route)){
            $controller->$method($params['id']);
            exit();
        }
        
    }

    public function notFound($controller){
        $controller->notFound();
        exit();
    }
}


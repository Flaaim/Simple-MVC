<?php

namespace App\Layouts;

class Layout {

    public function __construct($pagetitle, $content, $layout = null){
        if($layout != null){
            require_once 'views/'.$layout;
        }
        require_once $content;
    }



   }
    


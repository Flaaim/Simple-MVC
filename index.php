<?php

require __DIR__."/vendor/autoload.php";

use App\Routes\Router;
use App\Controllers\DocumentController;
use App\Controllers\DefaultController;
use App\Controllers\User\User;


$route = new Router();
$route->add('/home', new DocumentController, 'index');
$route->add('/test/{user}/{id}/edit', new DocumentController, 'test');



$route->notFound(new DefaultController);





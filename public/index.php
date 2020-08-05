<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MVC\utils\DotEnv;
use gabrielix29\Router\Router;

use MVC\app\controllers\MainController;

DotEnv::load();

$router = new Router();

$router->add("GET", "/\//", [new MainController(), "index"]);
$router->run();
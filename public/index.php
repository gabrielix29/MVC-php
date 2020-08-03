<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MVC\core\Router;
use MVC\utils\DotEnv;

use MVC\app\controllers\MainController;

DotEnv::load();

$router = new Router();

$router->add("GET", "/\//", [new MainController(), "index"]);
$router->run();
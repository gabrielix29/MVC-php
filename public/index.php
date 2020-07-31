<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MVC\core\Router;
use MVC\utils\DotEnv;

DotEnv::load();

$router = new Router();

$router->add("GET", "/\//", ["MVC\\app\\controllers\\MainController", "index"]);
$router->run();
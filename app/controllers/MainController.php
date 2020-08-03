<?php

namespace MVC\app\controllers;

use MVC\core\Controller;
use MVC\core\View;

class MainController extends Controller {
    public function index($uriParts) {
        $this->view->render('home/index.html');
    }
}

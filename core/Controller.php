<?php

namespace MVC\classes;

use MVC\core\View;

abstract class Controller
{
    protected View $view;

    function __construct()
    {
        $this->view = new View();
    }
}

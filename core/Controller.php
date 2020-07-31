<?php

namespace MVC\classes;

use MVC\core\View;

abstract class Controller
{
    private View $view;

    function __construct()
    {
        $this->view = new View();
    }
}

<?php

namespace MVC\core;

abstract class Controller
{
    protected View $view;

    function __construct()
    {
        $this->view = new View();
    }
}

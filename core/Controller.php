<?php

namespace MVC\core;

class Controller
{
    protected View $view;

    protected function getView() {
        return new View();
    }
}

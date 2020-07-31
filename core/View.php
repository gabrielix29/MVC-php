<?php

namespace MVC\core;

use Twig\Environment;
use Twig\Loader\Filesystemloader;

class View
{
    private string $defaultTemplate;
    private string $viewDir;
    private array $data;

    function __construct()
    {
        $this->data = array();
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new Filesystemloader(dirname(__DIR__) . '/app/views');
            $twig = new Environment($loader);
        }

        echo $twig->render($template, $args);
    }

    public function render(string $view, array $data = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new Filesystemloader(dirname(__DIR__) . '/app/views');
            $twig = new Environment($loader);
        }

        echo $twig->render($view, $data);
    }

    public function setData(array $data) {
        $this->data = $data;
    }

    public function addData(array $data) {
        array_push($this->data, $data);
    }
}
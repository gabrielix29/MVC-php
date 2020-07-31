<?php

namespace MVC\core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    private string $defaultTemplate;
    private string $viewDir;
    private array $data;

    function __construct()
    {
        $this->data = array();
    }

    public function render(string $view, array $data = null)
    {
        if ($data) {
            $this->data = $data;
        }

        $loader = new FilesystemLoader(dirname(__DIR__) . '/app/views');
        $twig = new Environment($loader);
        echo $twig->render($view, $this->data);
    }

    public function setData(array $data) {
        $this->data = $data;
    }

    public function addData(array $data) {
        array_push($this->data, $data);
    }
}
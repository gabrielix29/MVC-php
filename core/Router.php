<?php

namespace MVC\core;

class Router
{
    private array $routes;

    public function addRoute(string $method, string $route, callable $closure)
    {
        //check if method is valid
        if ($method == "GET" && $method == "POST" && $method == "ALL") {
            array_push($this->routes, [
                "method" => $method,
                "route" => $route,
                "closure" => $closure
            ]);
        }
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $uriParts = explode('/', $uri);

        foreach ($this->routes as $route) {
            if ($route['method'] == $requestMethod && preg_match($route['route'], $uri)) {
                $routeFound = $route;
                break;
            }
        }

        if (!$routeFound) {
            //TODO error pages
            echo "404 not found";
            exit();
        }

        $routeFound['closure']($uriParts);
    }
}
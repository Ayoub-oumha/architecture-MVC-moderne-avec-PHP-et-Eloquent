<?php

namespace Core;

class Router {
    private array $routes = [];

    public function get(string $uri, callable|array $action): void {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, callable|array $action): void {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(string $uri, string $method): void {
        $method = strtoupper($method);
        
        // Get current URL path
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = trim($uri, '/');
        // Remove 'public' from URL if present
        $uri = str_replace('public/', '', $uri);
        
        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];
            
            if (is_callable($action)) {
                call_user_func($action);
            } elseif (is_array($action)) {
                [$controller, $method] = $action;
                $controllerInstance = new $controller();
                call_user_func([$controllerInstance, $method]);
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    // Helper method to get current route
    public function getCurrentRoute(): string {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

<?php

namespace App\Routes;

class Router
{
    private array $routes = [];

    // Register a GET route
    public function get(string $path, callable $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    // Register a POST route
    public function post(string $path, callable $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    // Register a PUT route
    public function put(string $path, callable $callback): void
    {
        $this->routes['PUT'][$path] = $callback;
    }

    // Register a DELETE route
    public function delete(string $path, callable $callback): void
    {
        $this->routes['DELETE'][$path] = $callback;
    }

    // Dispatch the request
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Normalize path (remove trailing slashes)
        $path = rtrim($path, '/');
        if ($path === '') {
            $path = '/';
        }

        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            call_user_func($callback);
        } else {
            http_response_code(404);
            echo json_encode([
                'error' => 'Route not found',
                'method' => $method,
                'path' => $path
            ]);
        }
    }
}

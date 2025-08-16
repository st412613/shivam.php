<?php

namespace App\Routes;

use App\Controllers\UserController;
use App\Routes\Router;

class UserRoutes {
    public static function register(Router $router): void {
        $controller = new UserController();

        // GET /users
        $router->get('/users', [$controller, 'index']);

        // POST /users
        $router->post('/users', [$controller, 'store']);

        // GET /users/show?id=1
        $router->get('/users/show', function () use ($controller) {
            $id = $_GET['id'] ?? null;
            if ($id) {
                $controller->show((int)$id);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Missing user ID']);
            }
        });

        // PUT /users/update?id=1
        $router->put('/users/update', function () use ($controller) {
            $id = $_GET['id'] ?? null;
            if ($id) {
                $controller->update((int)$id);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Missing user ID']);
            }
        });

        // DELETE /users/delete?id=1
        $router->delete('/users/delete', function () use ($controller) {
            $id = $_GET['id'] ?? null;
            if ($id) {
                $controller->delete((int)$id);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Missing user ID']);
            }
        });
    }
}

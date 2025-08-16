<?php

namespace App\Routes;

use App\Routes\Router;
use App\Routes\UserRoutes;

class Web {
    public static function loadRoutes(): void {
        $router = new Router();

        UserRoutes::register($router); // Register all user-related routes

        $router->dispatch(); // Dispatch routes
    }
}

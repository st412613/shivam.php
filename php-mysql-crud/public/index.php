<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Routes\Web;

// Load and register all routes
Web::loadRoutes();

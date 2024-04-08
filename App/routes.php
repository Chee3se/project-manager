<?php

// Controllers

use Controllers\HomeController;

// Routes

$router->get('/', [HomeController::class, 'index']);
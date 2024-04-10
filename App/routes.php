<?php

// Controllers

use Controllers\HomeController;
use Controllers\LoginController;
use Controllers\TaskController;

// Routes

// Home
$router->get('/', [HomeController::class, 'index']);
// Tasks
$router->get('/tasks', [TaskController::class, 'index']);
// Login
$router->get('/login', [LoginController::class, 'index']);
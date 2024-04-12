<?php

// Controllers

use Controllers\HomeController;
use Controllers\SessionController;
use Controllers\UserController;
use Controllers\TaskController;

// Routes

// Home
$router->get('/', [HomeController::class, 'index']);
// Tasks
$router->get('/tasks', [TaskController::class, 'index'])->middleware('auth');
// Login
$router->get('/login', [SessionController::class, 'create']);
$router->post('/login', [SessionController::class, 'store']);
// Logout
$router->get('/logout', [SessionController::class, 'destroy']);
// Register
$router->get('/register', [UserController::class, 'create']);
$router->post('/register', [UserController::class, 'store']);
// Profile
$router->get('/profile', [UserController::class, 'show'])->middleware('auth');

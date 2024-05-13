<?php

// Controllers

use Controllers\HomeController;
use Controllers\ProjectsController;
use Controllers\ProjectsUsersController;
use Controllers\SessionController;
use Controllers\UserController;
use Controllers\TaskController;
use Controllers\ScheduleController;

// Routes

// Home
$router->get('/', [HomeController::class, 'index']);
// Tasks
$router->get('/tasks', [TaskController::class, 'index'])->middleware('auth');
$router->get('/tasks/create', [TaskController::class, 'create'])->middleware('auth');
$router->post('/tasks', [TaskController::class, 'store'])->middleware('auth');
$router->delete('/tasks/{id}', [TaskController::class, 'destroy'])->middleware('auth');
$router->get('/tasks/edit/{id}', [TaskController::class, 'edit'])->middleware('auth');
$router->patch('/tasks', [TaskController::class, 'update'])->middleware('auth');

//Projects
$router->get('/projects', [ProjectsController::class, 'index'])->middleware('auth');
$router->get('/projects/create', [ProjectsController::class, 'create'])->middleware('auth');
$router->post('/projects', [ProjectsController::class, 'store'])->middleware('auth');
$router->get('/projects/members', [ProjectsController::class, 'add'])->middleware('auth');
$router->post('/projects/members', [ProjectsController::class, 'members'])->middleware('auth');
$router->delete('/projects/{id}', [ProjectsController::class, 'destroy'])->middleware('auth');
$router->delete('/projects/members/{id}', [ProjectsController::class, 'delete_member'])->middleware('auth');

// Schedule
$router->get('/schedule', [ScheduleController::class, 'index'])->middleware('auth');

// Login
$router->get('/login', [SessionController::class, 'create'])->middleware('guest');
$router->post('/login', [SessionController::class, 'store'])->middleware('guest');
// Logout
$router->get('/logout', [SessionController::class, 'destroy'])->middleware('auth');
// Register
$router->get('/register', [UserController::class, 'create'])->middleware('guest');
$router->post('/register', [UserController::class, 'store'])->middleware('guest');;
// Profile
$router->get('/profile', [UserController::class, 'show'])->middleware('auth');
// Update status of task (AJAX)
$router->post('/task/update_status', [TaskController::class, 'update_status'])->middleware('auth');
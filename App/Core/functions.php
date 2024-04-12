<?php

use Core\Session;

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function base_path($path = '') {
    return BASE_PATH . $path;
}

function view($view, $attributes = []) {
    extract($attributes);
    return require base_path('views/' . $view . '.view.php');
}

function component($component, $attributes = []) {
    extract($attributes);
    return require base_path('views/components/' . $component . '.php');
}

function returned_errors() {
    $errors = Session::get('errors');
    return compact('errors');
}

function redirect($path) {
    header("Location: {$path}");
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}

function loggedin() {
    return Session::get('user');
}

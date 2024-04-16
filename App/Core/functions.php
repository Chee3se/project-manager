<?php

use Core\Session\Session;

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

function error($error) {
    $errors = Session::get('errors');
    if ($errors) {
        if (array_key_exists($error, $errors)) {
            return "<p class='form-error' >{$errors[$error][0]}</p>";
        }
    }
}

function console_error($error) {
    echo '<script>console.error("'.addslashes($error).'")</script>';
}

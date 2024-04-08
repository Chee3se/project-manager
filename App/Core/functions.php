<?php

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
    require base_path('views/' . $view . '.view.php');
}

function component($component, $attributes = []) {
    extract($attributes);
    require base_path('views/components/' . $component . '.php');
}

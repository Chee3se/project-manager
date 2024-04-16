<?php

use Core\Container\App;
use Core\Container\Container;
use Core\Database\Database;
use Models\User;


$container = new Container();


$container->bind('Core\Database\Database', function () {
    $config = require base_path('config.php');

    try {
        return new Database($config);
    } catch (Exception $e) {
        http_response_code(500);
        require base_path("views/500.view.php");
        console_error($e->getMessage());
        die();
    }
});

App::setContainer($container);
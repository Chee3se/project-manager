<?php

use Core\Container\App;
use Core\Container\Container;
use Core\Database\Database;


$container = new Container();


$container->bind('Core\Database\Database', function () {
    $config = require base_path('config.php');


    return new Database($config);
});

App::setContainer($container);
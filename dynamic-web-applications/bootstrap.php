<?php

use Core\App;
use Core\Container;
use Core\PGSQLDatabase;

$container = new Container();

App::setContainer($container);

App::bind('Core\PGSQLDatabase', function(){
    $config = require base_path('config.php');
    return new PGSQLDatabase($config['database']);
});

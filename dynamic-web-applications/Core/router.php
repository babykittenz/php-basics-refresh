<?php

require 'helpers/routeToController.php';
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI']);

routeToController($routes, $uri);
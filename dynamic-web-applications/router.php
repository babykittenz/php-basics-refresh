<?php

require 'helpers/routeToController.php';
$routes = require 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI']);

routeToController($routes, $uri);
<?php

require 'helpers/routeToController.php';

$uri = parse_url($_SERVER['REQUEST_URI']);

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

routeToController($routes, $uri);
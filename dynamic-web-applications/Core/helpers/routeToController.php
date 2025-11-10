<?php

use Core\Response;

require 'abort.php';

function routeToController(string $routes, string $uri): void
{
    if(array_key_exists($uri['path'], $routes)) {
        require $routes[$uri['path']];
    }else{
        abort(Response::NOT_FOUND);
    }
}
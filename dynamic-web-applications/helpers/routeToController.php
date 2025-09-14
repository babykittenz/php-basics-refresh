<?php
require 'abort.php';
function routeToController($routes, $uri) {
    if(array_key_exists($uri['path'], $routes)) {
        require $routes[$uri['path']];
    }else{
        abort(404);
    }
}
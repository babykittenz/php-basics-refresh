<?php
// we will only use functions php for the actual logic of debugging testing and developing.

// create die dump function
function dd($var)
{
    echo '<pre>' . var_dump($var) . '</pre>';
    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path . '.view.php' );
}
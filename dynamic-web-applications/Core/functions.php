<?php
// we will only use functions php for the actual logic of debugging testing and developing.

// create die dump function
use Core\Session;
use JetBrains\PhpStorm\NoReturn;

#[NoReturn]
function dd($var): void
{
    echo '<pre>' . var_dump($var) . '</pre>';
    die();
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}


function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function view(string $path, array $attributes = []): void
{
    extract($attributes);
    require base_path('views/' . $path . '.view.php' );
}

#[NoReturn]
function redirect(string $path): void
{
    header('location: ' . $path);
    exit();
}

function old(string $key, $default = ''): mixed{
        return Session::get('old')[$key] ?? $default;
}
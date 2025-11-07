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


function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path . '.view.php' );
}
function login($user){
    session_start();

    $_SESSION['user'] = [
        'email' => $user['email'],
    ];

    session_regenerate_id(true);
}

function logout(){
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly'] );
}
<?php

use Core\Response;
use Core\Router;


function authorize(bool $condition, int $status = Response::FORBIDDEN): void
{
    if(!$condition){
        Router::abort($status);
    }
}
<?php

use Core\Response;
use Core\Router;


function authorize($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        Router::abort($status);
    }
}
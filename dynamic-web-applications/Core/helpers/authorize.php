<?php

use Core\Response;

function authorize($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}
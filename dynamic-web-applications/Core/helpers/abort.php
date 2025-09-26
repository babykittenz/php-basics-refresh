<?php

function abort($code){
    http_response_code($code);
    require base_path('controllers/' . $code . '.php');
}
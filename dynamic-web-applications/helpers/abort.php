<?php

function abort($code){
    http_response_code($code);
    require 'controllers/' . $code . '.php';
}
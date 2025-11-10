<?php

function abort(int $code): void
{
    http_response_code($code);
    require base_path('controllers/' . $code . '.php');
}
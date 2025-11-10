<?php

require 'isCurrentURI.php';
function isActiveNavigation(string $uri): string
{
    return isCurrentURI($uri) ? 'rounded-md bg-gray-950/50' : '';
}
<?php

require 'isCurrentURI.php';
function isActiveNavigation($uri)
{
    return isCurrentURI($uri) ? 'rounded-md bg-gray-950/50' : '';
}
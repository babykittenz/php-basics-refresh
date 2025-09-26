<?php

function isCurrentURI($uri) {
    return $uri === $_SERVER['REQUEST_URI'];
}
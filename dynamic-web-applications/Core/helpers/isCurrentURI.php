<?php

function isCurrentURI(string $uri): bool {
    return $uri === $_SERVER['REQUEST_URI'];
}
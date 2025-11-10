<?php

namespace Core;

class App
{
    protected static mixed $container;
    // set the container as a singleton to the app
    public static function setContainer(mixed $container): void
    {
        static::$container = $container;
    }

    public static function container(): mixed{
        return static::$container;
    }

    public static function bind(string $key, mixed $resolver): void
    {
        static::$container->bind($key, $resolver);
    }

    public static function resolve(string $key): mixed{
        return static::$container->resolve($key);
    }

}
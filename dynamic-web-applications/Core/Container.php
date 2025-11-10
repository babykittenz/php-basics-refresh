<?php
namespace Core;

use Exception;

class Container
{
    protected array $bindings = [];
    public function bind(string $key, mixed $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * @throws Exception if no binding found for $key
     */
    public function resolve(string $key): mixed
    {
        if(!array_key_exists($key, $this->bindings)){
            throw new Exception("No binding found for {$key}");
        }
        $resolver = $this->bindings[$key];
        return call_user_func($resolver);

    }
}
<?php

namespace Spa_auth\Articulos\Application\Container;

use Spa_auth\Articulos\Application\Container\Contracts\Container;
use Illuminate\Container\Container as IoC;

class LaravelContainer implements Container
{
    private $container;

    public function __construct(IoC $container)
    {
        $this->container = $container;
    }

    public function make($class)
    {
        return $this->container->make($class);
    }
}

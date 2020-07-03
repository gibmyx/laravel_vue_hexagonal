<?php

namespace Spa_auth\Application\Bus\Contracts;

interface Container
{
    public function make($class);
}

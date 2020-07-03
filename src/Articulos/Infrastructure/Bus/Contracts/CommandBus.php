<?php

namespace Spa_auth\Articulos\Infrastructure\Bus\Contracts;

interface CommandBus
{
    public function execute($command);
}


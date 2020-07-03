<?php

namespace Spa_auth\Infrastructure\Bus\Contracts;

interface CommandBus
{
    public function execute($command);
}

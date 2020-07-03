<?php

namespace Spa_auth\Infrastructure\Bus;

use Spa_auth\Infrastructure\Bus\Contracts\CommandBus;
use Spa_auth\Application\Bus\Contracts\Container;
use Spa_auth\Application\Contracts\Command;

final class SimpleCommandBus implements CommandBus
{
    private const COMMAND_PREFID = 'Command';
    private const HANDLER_PREFIX = 'Handler';

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function execute($command)
    {
        return $this->resolveHandler($command)->__invoke($command);
    }

    private function resolveHandler($command)
    {
        return $this->container->make( $this->getHandlerClass($command) );
    }

    private function getHandlerClass(Command $command): string
    {
        return str_replace(
          self::COMMAND_PREFID,
          self::HANDLER_PREFIX,
          get_class($command)
        );
    }



}

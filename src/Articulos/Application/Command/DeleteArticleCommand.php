<?php


namespace Spa_auth\Articulos\Application\Command;


use Spa_auth\Articulos\Application\Command\Contracts\Command;

class DeleteArticleCommand implements Command
{
    private $id;

    public function __construct(?int $id)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return !empty($this->id) ? $this->id : null;
    }
}

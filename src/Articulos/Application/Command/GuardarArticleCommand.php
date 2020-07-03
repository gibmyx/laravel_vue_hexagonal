<?php

namespace Spa_auth\Articulos\Application\Command;

use Spa_auth\Articulos\Application\Command\Contracts\Command;

class GuardarArticleCommand implements Command
{

    private $id;
    private $title;
    private $content;

    public function __construct(?int $id, String $title = null, string $content = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getId(): ?int
    {
        return !empty($this->id) ? $this->id : null;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }
}

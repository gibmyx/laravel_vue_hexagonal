<?php

namespace Spa_auth\Application\Services\Article;

use Spa_auth\Application\Contracts\Command;

class CreateArticleCommand implements Command
{

    private $autor_id;
    private $title;
    private $content;

    public function __construct(?int $autor_id, String $title, string $content)
    {
        $this->autor_id = $autor_id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getAutorId(): ?int
    {
        return $this->autor_id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

}

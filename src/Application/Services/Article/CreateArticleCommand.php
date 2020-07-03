<?php

namespace Spa_auth\Application\Services\Article;

use Spa_auth\Application\Contracts\Command;

class CreateArticleCommand implements Command
{

    private $id;
    private $title;
    private $content;

    public function __construct(?int $id, String $title, string $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getId(): ?int
    {
        return !empty($this->id) ? $this->id : null;
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

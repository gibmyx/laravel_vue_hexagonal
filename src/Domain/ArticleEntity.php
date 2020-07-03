<?php

namespace Spa_auth\Domain;


final class ArticleEntity
{
    private $autor_id;
    private $title;
    private $content;

    public function __construct(?int $autor_id, string $title, string $content)
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

    public function setTitle(string $title): string
    {
        return ucfirst($title);
    }

    public function setContent(string $content): string
    {
        return $this->filterBadWords($content);
    }

    private function filterBadWords($text): ?string
    {
        return $text;
    }

    public function getCreate(): array
    {
        return [
            'id' => $this->autor_id,
            'title' => $this->title,
            'content' => $this->content
        ];
    }
}

<?php

namespace Spa_auth\Articulos\Infrastructure\Eloquent;

use App\Article;
use Spa_auth\Articulos\Domain\Entity\ArticleEntity;
use Spa_auth\Articulos\Domain\Repository\ArticleRepository;

class ArticleEloquentRepository implements ArticleRepository
{
    private $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function save(ArticleEntity $article): void
    {
        $this->model->create($article->getCreate());
    }

    public function update(ArticleEntity $article): void
    {
        $objet = $this->model::where('id', $article->getId())->first();
        $objet->update($article->getCreate());
    }

    public function delete(ArticleEntity $article): void
    {
        $objet = $this->model::where('id', $article->getId())->first();
        $objet->delete();
    }
}

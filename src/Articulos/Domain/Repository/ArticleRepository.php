<?php

namespace Spa_auth\Articulos\Domain\Repository;

use Spa_auth\Articulos\Domain\Entity\ArticleEntity;

interface ArticleRepository
{
    public function save(ArticleEntity $article) : void;
    public function update(ArticleEntity $article) : void;
    public function delete(ArticleEntity $article) : void;
}

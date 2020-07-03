<?php

namespace Spa_auth\Domain;

interface ArticleRepository
{
    public function save(ArticleEntity $article) : void;
}

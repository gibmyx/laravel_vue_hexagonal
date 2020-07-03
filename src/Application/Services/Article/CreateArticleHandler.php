<?php

namespace Spa_auth\Application\Services\Article;

use Spa_auth\Domain\ArticleEntity;
use Spa_auth\Domain\ArticleRepository;

final class CreateArticleHandler implements Hendler
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($command)
    {

        $article = new ArticleEntity(
            $command->getAutorId(),
            $command->getTitle(),
            $command->getContent()
        );

        $this->repository->save($article);
    }
}

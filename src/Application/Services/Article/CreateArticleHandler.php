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
            $command->getId(),
            $command->getTitle(),
            $command->getContent()
        );

        if(empty($article->getId())) {
            $this->repository->save($article);
        }else{
            $this->repository->update($article);
        }
    }
}

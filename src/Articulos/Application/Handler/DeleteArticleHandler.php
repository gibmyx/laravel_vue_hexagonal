<?php


namespace Spa_auth\Articulos\Application\Handler;


use Spa_auth\Articulos\Application\Handler\Contracts\Hendler;
use Spa_auth\Articulos\Domain\Entity\ArticleEntity;
use Spa_auth\Articulos\Domain\Repository\ArticleRepository;

class DeleteArticleHandler implements Hendler
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($command)
    {
        $article = new ArticleEntity(
            $command->getId()
        );

        $this->repository->delete($article);
    }
}

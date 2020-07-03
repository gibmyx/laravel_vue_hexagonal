<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spa_auth\Application\Services\Article\CreateArticleCommand;
use Spa_auth\Infrastructure\Bus\Contracts\CommandBus;

class ArticleController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }
    public function store()
    {
        $author_id = null;
        $title = "Titulo prueba 2";
        $content = "Contenido del post 2";

        $command = new CreateArticleCommand(
            $author_id,
            $title,
            $content
        );

        $this->comandBus->execute($command);

        return response()->json(['result' => 'Article created.']);
    }

}

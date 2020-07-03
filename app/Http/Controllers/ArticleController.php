<?php

namespace App\Http\Controllers;


use App\Article;
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
    public function store(Request $request)
    {
        $command = new CreateArticleCommand(
            $request->input('id'),
            $request->input('title'),
            $request->input('content')
        );

        $this->comandBus->execute($command);

        return response()->json(['result' => 'Article created.']);
    }

    public function listar()
    {
        $articulos = Article::all();
        return response()->json(['articulos' => $articulos]);
    }

}

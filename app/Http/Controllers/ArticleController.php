<?php

namespace App\Http\Controllers;


use App\Article;
use Illuminate\Http\Request;
use Spa_auth\Articulos\Application\Command\DeleteArticleCommand;
use Spa_auth\Articulos\Application\Command\GuardarArticleCommand;
use Spa_auth\Articulos\Infrastructure\Bus\Contracts\CommandBus;


class ArticleController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function guardar(Request $request)
    {
        $command = new GuardarArticleCommand(
            $request->input('id'),
            $request->input('title'),
            $request->input('content')
        );

        $this->comandBus->execute($command);

        return response()->json(['result' => 'Articulo creado.']);
    }

    public function delete(Request $request)
    {
        $command = new DeleteArticleCommand(
            $request->input('id')
        );

        $this->comandBus->execute($command);

        return response()->json(['result' => 'Articulo borrado.']);
    }

    public function listar()
    {
        $articulos = Article::all();

        return response()->json(['articulos' => $articulos]);
    }

}

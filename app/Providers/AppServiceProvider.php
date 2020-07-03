<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Spa_auth\Articulos\Infrastructure\Bus\Contracts\CommandBus;
use Spa_auth\Articulos\Infrastructure\Bus\SimpleCommandBus;

use Spa_auth\Articulos\Application\Container\Contracts\Container;
use Spa_auth\Articulos\Application\Container\LaravelContainer;

use Spa_auth\Articulos\Domain\Repository\ArticleRepository;
use Spa_auth\Articulos\Infrastructure\Eloquent\ArticleEloquentRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            CommandBus::class,
            SimpleCommandBus::class
        );

        $this->app->bind(
            Container::class,
            LaravelContainer::class
        );

        $this->app->bind(
            ArticleRepository::class,
            ArticleEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

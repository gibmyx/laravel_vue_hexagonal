<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spa_auth\Application\Bus\Contracts\Container;
use Spa_auth\Domain\ArticleRepository;
use Spa_auth\Infrastructure\Bus\Contracts\CommandBus;
use Spa_auth\Infrastructure\Bus\LaravelContainer;
use Spa_auth\Infrastructure\Eloquent\ArticleEloquentRepository;
use Spa_auth\Infrastructure\Bus\SimpleCommandBus;

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

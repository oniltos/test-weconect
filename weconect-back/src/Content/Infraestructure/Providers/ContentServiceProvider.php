<?php

declare(strict_types=1);

namespace Content\Infraestructure\Providers;
use Content\Domain\Repositories\ArticleRepositoryInterface;
use Content\Infraestructure\Repository\ArticleRepository;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ ."/../Database/Migrations");

        $this->loadFactoriesFrom(__DIR__ ."/../Database/Factories");

        $this->loadRoutesFrom(__DIR__ ."/../../routes/api.php");
    }
}

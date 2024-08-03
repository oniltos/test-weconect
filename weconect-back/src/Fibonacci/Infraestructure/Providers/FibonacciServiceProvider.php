<?php

declare(strict_types= 1);

namespace Fibonacci\Infraestructure\Providers;

use Illuminate\Support\ServiceProvider;
use Fibonacci\Domain\Fibonacci;
use Fibonacci\Infraestructure\Commands\GenerateFibonacci;

class FibonacciServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Fibonacci::class, function ($app) {
            return new Fibonacci();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateFibonacci::class,
            ]);
        }
    }
}

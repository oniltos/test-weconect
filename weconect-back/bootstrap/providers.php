<?php
use Content\Infraestructure\Providers\ContentServiceProvider;
use Fibonacci\Infraestructure\Providers\FibonacciServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    ContentServiceProvider::class,
    FibonacciServiceProvider::class,
];

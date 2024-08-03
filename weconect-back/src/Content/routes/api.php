<?php

declare(strict_types=1);

use Content\Infraestructure\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::prefix("api")->group(function () {
    Route::apiResource('/articles', ArticleController::class);
});

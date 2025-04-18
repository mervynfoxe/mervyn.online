<?php

use App\Http\Controllers\BlogIndexController as IndexController;

use BenBjurstrom\Prezet\Http\Controllers\ImageController;
use BenBjurstrom\Prezet\Http\Controllers\OgimageController;
use BenBjurstrom\Prezet\Http\Controllers\SearchController;
use BenBjurstrom\Prezet\Http\Controllers\ShowController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;

Route::withoutMiddleware([
    ShareErrorsFromSession::class,
    StartSession::class,
    ValidateCsrfToken::class,
])
    ->group(function () {
        Route::get('prezet/search', SearchController::class)->name('prezet.search');

        Route::get('blog/img/{path}', ImageController::class)
            ->name('prezet.image')
            ->where('path', '.*');

        Route::get('/blog/ogimage/{slug}', OgimageController::class)
            ->name('prezet.ogimage')
            ->where('slug', '.*');

        Route::get('blog', IndexController::class)
            ->name('prezet.index');

        Route::get('blog/{slug}', ShowController::class)
            ->name('prezet.show')
            ->where('slug', '.*');
        // https://laravel.com/docs/11.x/routing#parameters-encoded-forward-slashes
    });

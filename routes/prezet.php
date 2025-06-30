<?php

use App\Http\Controllers\Prezet\ImageController;
use App\Http\Controllers\Prezet\IndexController;
use App\Http\Controllers\Prezet\OgimageController;
use App\Http\Controllers\Prezet\SearchController;
use App\Http\Controllers\Prezet\ShowController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;

Route::withoutMiddleware([
    ShareErrorsFromSession::class,
    StartSession::class,
    VerifyCsrfToken::class,
])
    ->group(function () {
        Route::get('blog/search', SearchController::class)->name('prezet.search');

        Route::get('blog/images/{path}', ImageController::class)
            ->name('prezet.image')
            ->where('path', '.*');

        Route::get('/blog/ogimage/{slug}', OgimageController::class)
            ->name('prezet.ogimage')
            ->where('slug', '.*');

        Route::get('blog/category/{slug}', IndexController::class)
            ->name('prezet.category')
            ->where('slug', '.*');

        Route::get('blog/tag/{slug}', IndexController::class)
            ->name('prezet.tag')
            ->where('slug', '.*');

        Route::get('blog', IndexController::class)
            ->name('prezet.index');

        Route::get('blog/{slug}', ShowController::class)
            ->name('prezet.show')
            ->where('slug', '.*'); // https://laravel.com/docs/11.x/routing#parameters-encoded-forward-slashes
    });

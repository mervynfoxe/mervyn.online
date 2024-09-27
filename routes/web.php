<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])
    ->name('app.home');

Route::feeds('/blog');

require __DIR__.'/prezet.php';

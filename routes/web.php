<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('legacy.index');
});

Route::get('/', [LandingController::class, 'index']);

require __DIR__.'/prezet.php';

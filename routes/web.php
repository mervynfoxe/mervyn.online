<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('legacy.index');
});

require __DIR__.'/prezet.php';

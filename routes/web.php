<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.home');
})->name('home'); // temp

Route::get('/about', function() {
    return view('app.about');
}); //temp

Route::get('/rules', function() {
    return view('app.rules');
})->name('rules');

require __DIR__.'/auth.php';

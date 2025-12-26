<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.home');
})->name('home'); // temp

Route::get('/about', function() {
    return view('app.about');
}); //temp

Route::get('rules', function() {
    return view('app.rules');
})->name('rules');

Route::get('rule-for-seller',function() {
    return view('app.rule-for-seller');
});

require __DIR__.'/auth.php';

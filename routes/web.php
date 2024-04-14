<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin');
});


Route::get('/blog', function () {
    return view('blog');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

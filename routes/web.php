<?php

use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('admin');
// });


// Route::get('/blog', function () {
//     return view('blog');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Blog Application Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

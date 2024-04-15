<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Backend\Dashboard;

// Route::get('/', function () {
//     return view('admin');
// });


// Route::get('/blog', function () {
//     return view('blog');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// // Blog Application Routes
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// // Category Controller
// Route::resource('categories' ,CategoryController::class)->only([
//     'index', 'store', 'update', 'destroy',
// ]);

// Livewire Routes
Route::get('dashboard', Dashboard::class)->name('dashboard');
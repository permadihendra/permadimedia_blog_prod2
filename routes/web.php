<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Backend\Dashboard;
use App\Livewire\Backend\CategoryPage;
use App\Livewire\Backend\ArticleWire;
use App\Livewire\Backend\ArticleCreateWire;
use App\Livewire\Backend\ArticleEditWire;
use App\Livewire\Backend\UserWire;

use App\Http\Middleware\UserRole;


Route::get('/', function () {
    return view('blog');
});


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

// Laravel filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Livewire Routes

Route::middleware('auth')->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    // Route::get('categories', CategoryPage::class)->name('categories');
    Route::get('articles', ArticleWire::class)->name('articles');
    Route::get('articles/create', ArticleCreateWire::class)->name('articles.create');
    Route::get('articles/edit/{article}', ArticleEditWire::class)->name('article.edit');
    Route::get('users', UserWire::class)->name('users');
});

Route::middleware('auth', 'roles:editor,administrator')->group(function(){
    Route::get('categories', CategoryPage::class)->name('categories');
});
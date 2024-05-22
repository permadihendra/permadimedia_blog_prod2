<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Backend\Dashboard;
use App\Livewire\Backend\CategoryPage;
use App\Livewire\Backend\ArticleWire;
use App\Livewire\Backend\ArticleCreateWire;
use App\Livewire\Backend\ArticleEditWire;
use App\Livewire\Backend\UserWire;
use App\Livewire\Backend\UserProfileWire;
use App\Livewire\Backend\BlogConfigWire;

use App\Livewire\Frontend\BlogWire;
use App\Http\Middleware\UserRole;
use App\Livewire\Frontend\BlogAllArticles;
use App\Livewire\Frontend\BlogArticleWire;
use App\Livewire\Frontend\BlogAbout;


// Route::get('/', function () {
//     return view('blog');
// });


// Route::get('/blog', function () {
//     return view('blog');
// });

Auth::routes();

Route::get('/registered', function () {
    return view('frontend.registered');
});

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

// Route::middleware('auth')->group(function() {
//     Route::get('dashboard', Dashboard::class)->name('dashboard');
//     // Route::get('categories', CategoryPage::class)->name('categories');
//     Route::get('articles', ArticleWire::class)->name('articles');
//     Route::get('articles/create', ArticleCreateWire::class)->name('articles.create');
//     Route::get('articles/edit/{article}', ArticleEditWire::class)->name('article.edit');
//     Route::get('users', UserWire::class)->name('users');
// });

// Blog Route
Route::middleware('web')->group(function () {
    Route::get('/', BlogWire::class)->name('blog-home');
    Route::get('/article/{slug}', BlogArticleWire::class)->name('blog-article');
    Route::get('/all-articles', BlogAllArticles::class)->name('blog-all-articles');
    Route::get('/about', BlogAbout::class)->name('blog-about');
});

// Admin Routes
Route::middleware('auth', 'roles:user,editor,administrator')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('articles', ArticleWire::class)->name('articles');
    Route::get('articles/create', ArticleCreateWire::class)->name('articles.create');
    Route::get('articles/edit/{article}', ArticleEditWire::class)->name('article.edit');
    Route::get('user/profile', UserProfileWire::class)->name('user.profile');
    Route::get('blog-config', BlogConfigWire::class)->name('blog.config');
});


Route::middleware('auth', 'roles:administrator')->group(function () {
    Route::get('categories', CategoryPage::class)->name('categories');
    Route::get('users', UserWire::class)->name('users');
});

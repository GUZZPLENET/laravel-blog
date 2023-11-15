<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/create', 'create')->name('post.create');
    Route::get('/user/{id}', [PostController::class, 'user'])->name('posts.user');
    Route::get('/{id}', 'post')->name('post');

    Route::post('/create', 'store');
});

Route::post('/posts/{id}/comment', [CommentController::class, 'store'])->name('post.comment');

Route::prefix('category')->controller(CategoryController::class)->group(function () {
    Route::get('/',  'index')->name('categories');
    Route::get('/{id}', 'category')->name('category');
});

Route::middleware('auth')->prefix('profile')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('profile');
    Route::post('/', 'store');
});

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter');


Route::middleware('admin')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/', [DashboardController::class, 'store']);

    Route::resource('posts', \App\Http\Controllers\Dashboard\PostController::class)->except(['show'])->names([
        'index' => 'dashboard.posts',
        'create' => 'dashboard.posts.create',
        'edit' => 'dashboard.posts.edit',
        'destroy' => 'dashboard.posts.destroy',
        'store' => 'dashboard.posts.store',
        'update' => 'dashboard.posts.update'
    ]);

    Route::resource('categories', \App\Http\Controllers\Dashboard\CategoryController::class)->except(['show'])->names([
        'index' => 'dashboard.categories',
        'create' => 'dashboard.categories.create',
        'edit' => 'dashboard.categories.edit',
        'destroy' => 'dashboard.categories.destroy',
        'store' => 'dashboard.categories.store',
        'update' => 'dashboard.categories.update'
    ]);
});

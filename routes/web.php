<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewPostController;
use App\Livewire\Posts\CreatePost;
use App\Http\Controllers\CategoryController;
use App\Livewire\Posts\PostDetail;

Route::get('/', function () {
    $categories = app(CategoryController::class)->index()->getData()['categories'];
    $posts = app(PostController::class)->index()->getData()['posts'];
    return view('home', compact('categories', 'posts'));
})->name('home');

Route::get('dashboard', [ViewPostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/article', [PostController::class, 'show'])->name('article');
Route::get('/article/{id}', PostDetail::class)->name('posts.show');


Route::view('contact', 'contact')->name('contact');

Route::view('faq', 'faq')->name('faq');

Route::get('/create', CreatePost::class)->middleware(['auth'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.dashboard');


require __DIR__ . '/auth.php';

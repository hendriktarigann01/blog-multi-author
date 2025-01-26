<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewPostController;
use App\Livewire\Text\RunningText;
use App\Livewire\Posts\CreatePost;
use App\Http\Controllers\CategoryController;
use App\Livewire\Category\CategoryDetail;
use App\Livewire\Posts\PostDetail;

Route::get('/', function () {
    $categories = app(CategoryController::class)->index()->getData()['categories'];
    $posts = app(PostController::class)->index()->getData()['posts'];
    $newestPosts = app(PostController::class)->newPosts()->getData()['newestPosts'];
    return view('home', compact('categories', 'posts', 'newestPosts'));
})->name('home');
Route::get('/home/{id}', CategoryDetail::class)->name('category.show');

Route::get('dashboard', [ViewPostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/article', function () {
    $posts = app(PostController::class)->show()->getData()['posts'];
    $newestPosts = app(PostController::class)->newPosts()->getData()['newestPosts'];
    return view('article', compact('posts', 'newestPosts'));
})->name('article');
Route::get('/article/{id}', PostDetail::class)->name('posts.show');

Route::view('contact', 'contact')->name('contact');

Route::view('faq', 'faq')->name('faq');

Route::get('/create', CreatePost::class)->middleware(['auth'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.dashboard');

Route::get('running-text', RunningText::class)->name('running-text');

require __DIR__ . '/auth.php';

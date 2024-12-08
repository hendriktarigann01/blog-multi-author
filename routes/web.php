<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewPostController;

Route::view('/', 'welcome');

Route::get('dashboard', [ViewPostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// navbar
Route::view('home', 'home')->name('home');
Route::view('blog', 'blog')->name('blog');
Route::view('category', 'category')->name('category');
Route::view('contact', 'contact')->name('contact');
Route::view('faq', 'faq')->name('faq');

Route::get('/create', function () {
    return view('livewire.posts.create-post');
})->middleware(['auth'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.dashboard');

require __DIR__ . '/auth.php';

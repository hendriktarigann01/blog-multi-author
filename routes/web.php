<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('home', 'home')->name('home');
Route::view('blog', 'blog')->name('blog');
Route::view('category', 'category')->name('category');
Route::view('contact', 'contact')->name('contact');
Route::view('faq', 'faq')->name('faq');

Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.dashboard');

require __DIR__ . '/auth.php';

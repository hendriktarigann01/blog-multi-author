<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewPostController;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\PostDetailAdmin;
use App\Livewire\Posts\PostEditAdmin;
use App\Http\Controllers\CategoryController;
use App\Livewire\Category\CategoryDetail;
use App\Livewire\Posts\PostDetail;

// Home Route
Route::get('/', function () {
    $categoryController = app(CategoryController::class);
    $postController = app(PostController::class);

    $categories = $categoryController->index()->getData()['categories'];
    $posts = $postController->index()->getData()['posts'];
    $newestPosts = $postController->newPosts()->getData()['newestPosts'];
    $showRunningText = $postController->showRunningText()->getData()['showRunningText'];

    return view('home', compact('categories', 'posts', 'newestPosts', 'showRunningText'));
})->name('home');

// Home Livewire
Route::get('/home/{id}', CategoryDetail::class)->name('category.show');

// Dashboard Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ViewPostController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/search', [ViewPostController::class, 'search'])->name('posts.search');

    Route::get('/dashboard/{id}', PostDetailAdmin::class)->name('posts.detailAdmin');
    // Post Edit Routes
    Route::get('/dashboard/{id}/edit', [PostEditAdmin::class, 'edit'])->name('posts.edit');
    Route::post('/dashboard/{id}/edit', [PostEditAdmin::class, 'update'])->name('posts.update');

    // Create Post Route
    Route::get('/create', CreatePost::class)->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.dashboard');
});

// Profile Route
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

// Article Routes
Route::get('/article', function () {
    $postController = app(PostController::class);
    $posts = $postController->showPosts()->getData()['posts'];
    $newestPosts = $postController->newPosts()->getData()['newestPosts'];
    $showRunningText = $postController->showRunningText()->getData()['showRunningText'];

    return view('article', compact('posts', 'newestPosts', 'showRunningText'));
})->name('article');

// Article Livewire
Route::get('/article/{id}', PostDetail::class)->name('posts.show');

// Authentication Routes
require __DIR__ . '/auth.php';

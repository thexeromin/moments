<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('explore');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('post', PostController::class);
Route::resource('comment',CommentController::class);
Route::post('/posts/{postId}/toggle-like', [PostController::class, 'toggleLike'])->middleware('auth')->name('post.like');
Route::get('/my-posts', [PostController::class, 'myPosts'])->middleware('auth')->name('post.my-post');

require __DIR__.'/auth.php';

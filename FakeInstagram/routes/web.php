<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

//POSTS
Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('post.index');
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('post.create');
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('post.store');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('post.show');

//Profile
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
 
 //Follow
Route::post('follow/{user}', [App\Http\Controllers\FollowerController::class, 'store'])->name('follower.store');
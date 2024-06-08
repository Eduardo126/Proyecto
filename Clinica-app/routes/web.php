<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para las publicaciones
Route::get('/dashboard', [PostController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.store');

// Rutas para los likes
Route::post('/posts/{post}/like', [PostController::class, 'like'])->middleware('auth')->name('posts.like');
Route::delete('/posts/{post}/like', [PostController::class, 'unlike'])->middleware('auth')->name('posts.unlike');


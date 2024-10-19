<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\CheckAge;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware([CheckAge::class])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class);
});

Route::get('/', function () {
    return to_route(route: 'posts.index');
});


Route::get('/not-allowed', function () {
    return view('not-allowed');
})->name('not.allowed');

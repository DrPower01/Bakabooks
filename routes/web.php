<?php
// File: routes/web.php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

Route::get('/', [BookController::class, 'index']);

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    return view('logout');

});

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/display', [BookController::class, 'display'])->name('books.display');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/home', [HomeController::class, 'homepage'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/find_friends', [HomeController::class, 'findFriends'])->name('findFriends');

Route::get('/add_post', [HomeController::class, 'addPost'])->name('addPost');
Route::post('/add_post', [HomeController::class, 'post'])->name('post');
Route::post('/comment', [HomeController::class, 'comment'])->name('comment');
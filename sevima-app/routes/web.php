<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/home', [LoginController::class, 'homepage'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/login', [LoginController::class, 'showLoginForm']);
// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/home', function () {
//     return view('homepage');
// });
// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/logout', function () {
//     auth()->logout();
//     return redirect('/');
// })->name('logout');

// Route::get('/', function () {
//     return view('loginpage'); 
// });

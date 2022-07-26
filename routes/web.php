<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostLikeController;

Route::get('/', [HomeController::Class, 'index']);


//Posts
Route::get('/home', [HomeController::Class, 'index'])->name('home');
Route::post('/home', [HomeController::Class, 'post']);
Route::delete('/home/{post}/posts', [HomeController::Class, 'destroy'])->name('posts.delete');

//To Like / Delete the post
Route::post('/home/{post}/likes', [PostLikeController::Class, 'save'])->name('posts.like');
Route::delete('/home/{post}/likes', [PostLikeController::Class, 'destroy'])->name('posts.like');

//User Auth
Route::post('/logout', [LogoutController::Class, 'logout'])->name('logout');

Route::get('/login', [LoginController::Class, 'index'])->name('login');
Route::post('/login', [LoginController::Class, 'store']);

Route::get('/register', [RegisterController::Class, 'index'])->name('register');
Route::post('/register', [RegisterController::Class, 'store']);

//Route::get('/', function () {
//    return view('home.index');
//});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function () {
Route::get('/', [RegisterController::class, 'register']);
Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('auth/google', [GoogleController::class, 'googleLogin'])->name('googleLogin');
// Route::post("google/logout",[GoogleController::class,'logout'])->name('logout');
Route::any("auth/google/callback",[GoogleController::class,'callback'])->name('callback');
});

Route::middleware(['auth'])->group(function () {
Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/product',[ProductController::class, 'product'])->name('products');
});





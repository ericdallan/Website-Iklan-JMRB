<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/About_Us', [HomeController::class, 'profil'])->name('About_Us');
Route::get('/Iklan', [HomeController::class, 'Iklan'])->name('Iklan');
// Route::get('/User/Login', [HomeController::class, 'LoginUser'])->name('LoginUser');
// Route::get('/User/Register', [HomeController::class, 'RegisterUser'])->name('RegisterUser');

//User
Route::get('/register', [LoginController::class, 'indexReg'])->name('register')->middleware('guest');
Route::post('/register', [LoginController::class, 'storeReg']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginuser']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/Admin/Login', [HomeController::class, 'LoginAdmin'])->name('LoginAdmin');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [HomeController::class, 'index'])->name('home');

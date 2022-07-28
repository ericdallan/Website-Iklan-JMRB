<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

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
// guest
Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/About_Us', [HomeController::class, 'profil'])->name('About_Us');
Route::get('/Iklan', [HomeController::class, 'Iklan'])->name('Iklan');

//User
Route::get('/register', [LoginController::class, 'indexReg'])->name('register')->middleware('web');
Route::post('/register', [LoginController::class, 'storeReg']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('web');
Route::get('/login-admin', [LoginController::class, 'index'])->name('login-admin')->middleware('web');
Route::post('/login', [LoginController::class, 'loginuser']);

Route::group(['prefix' => 'user', 'middleware' => 'user'], function () {

    Route::middleware(['guest:web'])->group(function () {
        Route::get('/profile-user', [UserController::class, 'indexProfil'])->name('profil-user');
    });
    Route::middleware(['auth:web'])->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});

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
//Landing Page
Route::get('/', [HomeController::class, 'landing_page'])->name('Home');
Route::get('/About_Us', [HomeController::class, 'about_us'])->name('About_Us');
Route::get('/Iklan', [HomeController::class, 'iklan'])->name('Iklan');

//Group Route User
//Non-Auth
Route::middleware(['guest:web'])->group(function(){
    //Register User
    Route::get('/register', [LoginController::class, 'indexReg'])->name('register');
    Route::post('/register', [LoginController::class, 'storeReg']);

    //Login User
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'loginuser']);
    
});

//Auth
Route::middleware(['auth:web'])->group(function(){
    //Profile User
    Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user/profile');
    Route::get('/user/profile/edit/{id}', [UserController::class, 'editprofile'])->name('user/profile/edit');
    Route::post('/user/profile/update', [UserController::class, 'updateprofile'])->name('user/profile/update');
    //Logout User
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Group Route Admin
//Non-Auth
Route::middleware(['guest:admin'])->group(function(){    
    //Login Admin
    Route::get('/login/admin', [LoginController::class, 'index'])->name('login/admin');
    Route::post('/login', [LoginController::class, 'loginadmin']);

});
//Auth
Route::middleware(['auth:admin'])->group(function(){
});
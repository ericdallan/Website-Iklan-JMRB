<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IklanController;

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
Route::get('/about_Us', [HomeController::class, 'about_us'])->name('About_Us');
Route::get('/iklan', [HomeController::class, 'iklan'])->name('Iklan');

//Group Route User
//Non-Auth
Route::middleware(['guest:web'])->group(function () {
    //Register User
    Route::get('/register', [LoginController::class, 'indexReg'])->name('register');
    Route::post('/register', [LoginController::class, 'storeReg']);

    //Login User
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'loginuser']);
});

//Auth
Route::middleware(['auth:web'])->group(function () {
    //Profile User
    Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user/profile');
    Route::get('/user/profile/edit/{id}', [UserController::class, 'editprofile'])->name('user/profile/edit');
    Route::post('/user/profile/update', [UserController::class, 'updateprofile'])->name('user/profile/update');
    //Logout User
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //Iklan User
    Route::get('user/iklan',[IklanController::class, 'indexUser'])->name('user/iklan');
});

//Group Route Admin
//Non-Auth
Route::middleware(['guest:admin'])->group(function () {
    //Login Admin
    Route::get('/login/admin', [AdminController::class, 'index'])->name('login/admin');
    Route::post('/login/admin', [AdminController::class, 'login']);
});
//Auth
Route::middleware(['auth:admin'])->group(function () {
    //Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/admin',[AdminController::class, 'dashboard_admin'])->name('dashboard/admin');
    Route::get('/dashboard/user',[AdminController::class, 'dashboard_user'])->name('dashboard/user');
    Route::get('/dashboard/iklan',[IklanController::class, 'index'])->name('dashboard/iklan');
    Route::post('/dashboard/iklan/create',[IklanController::class,'create_iklan'])->name('dashboard/iklan/create');
    //Logout Admin
    Route::post('/logout/admin', [AdminController::class, 'logout'])->name('logoutadmin');
    //Profile Admin
    Route::get('/admin/profile/{id}', [AdminController::class, 'profile'])->name('admin/profile');
    Route::get('/admin/profile/edit/{id}', [AdminController::class, 'editprofile'])->name('admin/profile/edit');
    Route::post('/admin/profile/update', [AdminController::class, 'updateprofile'])->name('admin/profile/update');
});

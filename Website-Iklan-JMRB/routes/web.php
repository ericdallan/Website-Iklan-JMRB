<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
// Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/About_Us', [HomeController::class, 'profil'])->name('About_Us');
Route::get('/Iklan', [HomeController::class, 'Iklan'])->name('Iklan');
Route::get('/User/Login', [HomeController::class, 'LoginUser'])->name('LoginUser');
Route::get('/User/Register', [HomeController::class, 'RegisterUser'])->name('RegisterUser');

// Route::prefix('user')->name('user.')->group(function(){

//     Route::middleware(['guest:web'])->group(function(){
//         Route::get('/User/Login', [HomeController::class, 'LoginUser'])->name('LoginUser');
//         Route::get('/User/Register', [HomeController::class, 'RegisterUser'])->name('RegisterUser');
//     });
// });

Route::get('/Admin/Login', [HomeController::class, 'LoginAdmin'])->name('LoginAdmin');

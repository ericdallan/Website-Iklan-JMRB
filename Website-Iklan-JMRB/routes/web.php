<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NegotiationsController;
use App\Http\Controllers\ReplaysController;

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
Route::get('/', [HomeController::class, 'landing_page'])->name('home');
Route::get('/about_us', [HomeController::class, 'about_us'])->name('about_us');
Route::get('/iklan', [HomeController::class, 'iklan'])->name('iklan');

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
    Route::get('/user/iklan',[IklanController::class, 'indexUser'])->name('user/iklan');
    Route::post('/user/iklan/create',[IklanController::class,'create_iklan'])->name('user/iklan/create');
    //Survey User
    Route::get('/user/survey',[IklanController::class, 'surveyUser'])->name('user/survey');
    //Negotiation User
    Route::get('/user/negotiation',[NegotiationsController::class, 'indexUser'])->name('user/negotiation');
    Route::get('/user/negotiation/detail/{id}',[NegotiationsController::class, 'detail_nego'])->name('user/negotiation/detail');
    Route::post('/user/negotiation/create',[NegotiationsController::class, 'create_nego'])->name('user/negotiation/create');
    //Chatroom User
    Route::get('/user/chatroom',[ChatroomController::class, 'indexUser'])->name('user/chatroom');
    Route::post('/user/chatroom/create',[ChatroomController::class, 'createChatroomUser'])->name('user/chatroom/create');
    Route::get('/user/chatroom/detail/{id}',[ChatroomController::class, 'detail_chatroom'])->name('user/chatroom/detail');
    //Message User
    Route::post('/user/chatroom/message/create',[MessageController::class, 'createMessageUser'])->name('user/chatroom/message/create');
    //Forum USer
    Route::get('/user/forum',[ForumsController::class,'index'])->name('user/forum');
    Route::get('/user/forum/detail/{id}',[ForumsController::class,'indexDetail'])->name('user/forum/detail');
    Route::post('/user/forum/create',[ForumsController::class,'create'])->name('user/forum/create');
    //Replay Forum User
    Route::post('/user/forum/replay/create',[ReplaysController::class,'createReplay'])->name('user/forum/replay/create');
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
    //Dashboad List Admin
    Route::get('/dashboard/admin',[AdminController::class, 'dashboard_admin'])->name('dashboard/admin');
    Route::post('/dashboard/admin/create',[AdminController::class, 'create_admin'])->name('dashboard/admin/create');
    Route::get('/dashboard/admin/delete/{id}',[AdminController::class, 'delete_admin'])->name('dashboard/admin/delete');
    //Dashboard List User
    Route::get('/dashboard/user',[AdminController::class, 'dashboard_user'])->name('dashboard/user');
    //Dashboard Iklan
    Route::get('/dashboard/iklan',[IklanController::class, 'index'])->name('dashboard/iklan');
    Route::post('/dashboard/iklan/create',[IklanController::class,'create_iklan'])->name('dashboard/iklan/create');
    Route::post('/dashboard/iklan/update', [IklanController::class, 'update_iklan'])->name('dashboard/iklan/update');
    Route::get('/dashboard/iklan/delete/{id}',[IklanController::class, 'delete_iklan'])->name('dashboard/iklan/delete');
    //Survey User
    Route::get('/dashboard/survey',[IklanController::class, 'surveyAdmin'])->name('dashboard/survey');
    Route::post('/dashboard/survey/update/{id}', [IklanController::class, 'update_survey'])->name('dashboard/survey/update');
    //Dashboard Negosiasi
    Route::get('/admin/negotiation',[NegotiationsController::class, 'indexAdmin'])->name('admin/negotiation');
    //Dashboard Chatroom Admin
    Route::get('/admin/chatroom',[ChatroomController::class, 'indexAdmin'])->name('admin/chatroom');
    Route::post('/admin/chatroom/create',[ChatroomController::class, 'createChatroomAdmin'])->name('admin/chatroom/create');
    Route::get('/admin/chatroom/detail/{id}',[ChatroomController::class, 'detail_chatroomAdmin'])->name('admin/chatroom/detail');
    //Message User
    Route::post('/admin/chatroom/message/create',[MessageController::class, 'createMessageAdmin'])->name('admin/chatroom/message/create');
    //Forum USer
    Route::get('/admin/forum',[ForumsController::class,'indexAdmin'])->name('admin/forum');
    Route::get('/admin/forum/detail/{id}',[ForumsController::class,'indexDetailAdmin'])->name('admin/forum/detail');
    //Replay Forum User
    Route::post('/admin/forum/replay/create',[ReplaysController::class,'createReplayAdmin'])->name('admin/forum/replay/create');
    //Logout Admin
    Route::post('/logout/admin', [AdminController::class, 'logout'])->name('logoutadmin');
    //Profile Admin
    Route::get('/admin/profile/{id}', [AdminController::class, 'profile'])->name('admin/profile');
    Route::get('/admin/profile/edit/{id}', [AdminController::class, 'editprofile'])->name('admin/profile/edit');
    Route::post('/admin/profile/update', [AdminController::class, 'updateprofile'])->name('admin/profile/update');
});

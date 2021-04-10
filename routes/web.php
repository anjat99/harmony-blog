<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FrontendController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\BlogApiController;

use \App\Http\Controllers\user\BlogPostController;

use \App\Http\Controllers\admin\BackendController;
use \App\Http\Controllers\admin\UserController;
use \App\Http\Controllers\admin\BlogController;

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

Route::get('/api/blogs', [BlogApiController::class,'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/api/blogs/{id}', [HomeController::class, 'show'])->name('blog');

Route::get("/register/create", [FrontendController::class, 'showRegisterForm'])->name('register.create');
Route::POST("/register", [FrontendController::class, 'register'])->name("register.store");
Route::get("/login/create", [FrontendController::class, 'showLoginForm'])->name('login.create');
Route::POST("/login", [FrontendController::class, 'login'])->name("login.store");

//region CONTROLLERS FOR USER MANAGING
Route::prefix('/user')->middleware(["isUserLoggedIn"])->group(function(){
    Route::get("/logout", [FrontendController::class, "logout"])->name("logout_user");
    Route::resource('/blogs', BlogPostController::class);
});
//endregion

//region CONTROLLERS FOR ADMIN MANAGING
Route::prefix('/admin')->middleware(["loggedIn","isAdminLoggedIn"])->group(function(){
    Route::get('/', [BackendController::class, 'index'])->name('admin');
    Route::get("/logout", [BackendController::class, "logout"])->name("logout_admin");

    Route::resource('/blogs-manage', BlogController::class);
    Route::put('/approved-blog/{id}', [BlogController::class,'approvePost'])->name('approved_post');
    Route::resource('/users', UserController::class);
});
//endregion

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminRegisterController;

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
// Route web
Route::get('/', [HomeController::class,'index']);

// route Admin
Route::get('/admin',  [AdminHomeController::class,'index'])->middleware('auth');
Route::get('/admin-login', [AdminLoginController::class,'index'])->middleware('guest');
Route::post('/admin-login', [AdminLoginController::class,'authenticate'])->middleware('guest');
Route::post('/admin-logout', [AdminLoginController::class,'logout'])->middleware('auth');
Route::get('/admin-register', [AdminRegisterController::class,'index'])->middleware('guest');
Route::post('/admin-register', [AdminRegisterController::class,'store'])->middleware('guest');
Route::get('/admin-profile', [AdminProfileController::class,'index'])->middleware('auth');
Route::get('/admin-category', [AdminCategoryController::class,'index'])->middleware('auth');
Route::get('/admin-category-alldata', [AdminCategoryController::class,'allData'])->middleware('auth');

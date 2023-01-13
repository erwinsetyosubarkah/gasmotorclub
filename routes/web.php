<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminMyproductController;
use App\Http\Controllers\Admin\AdminVisidanmisiController;

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

Route::get('/admin-login', [AdminLoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/admin-login', [AdminLoginController::class,'authenticate'])->middleware('guest');
Route::post('/admin-logout', [AdminLoginController::class,'logout'])->middleware('auth');
Route::get('/admin-register', [AdminRegisterController::class,'index'])->middleware('guest');
Route::post('/admin-register', [AdminRegisterController::class,'store'])->middleware('guest');

Route::get('/admin-profile', [AdminProfileController::class,'index'])->middleware('auth');
Route::post('/admin-profile', [AdminProfileController::class,'edit'])->middleware('auth');

Route::get('/admin-visidanmisi', [AdminVisidanmisiController::class,'index'])->middleware('auth');
Route::post('/admin-visidanmisi', [AdminVisidanmisiController::class,'edit'])->middleware('auth');

Route::get('/admin-myproduct', [AdminMyproductController::class,'index'])->middleware('auth');
Route::post('/admin-myproduct', [AdminMyproductController::class,'store'])->middleware('auth');
Route::post('/admin-myproduct/{myproduct}', [AdminMyproductController::class,'destroy'])->middleware('auth');
Route::get('/admin-myproduct-edit/{myproduct}', [AdminMyproductController::class,'showedit'])->middleware('auth');
Route::post('/admin-myproduct-edit/{myproduct}', [AdminMyproductController::class,'edit'])->middleware('auth');

Route::get('/admin-category', [AdminCategoryController::class,'index'])->middleware('auth');
Route::post('/admin-category', [AdminCategoryController::class,'store'])->middleware('auth');
Route::post('/admin-category/{category}', [AdminCategoryController::class,'destroy'])->middleware('auth');
Route::get('/admin-category-alldata', [AdminCategoryController::class,'allData'])->middleware('auth');
Route::get('/admin-category-edit/{category}', [AdminCategoryController::class,'showedit'])->middleware('auth');
Route::post('/admin-category-edit/{category}', [AdminCategoryController::class,'edit'])->middleware('auth');

Route::get('/admin-post', [AdminPostController::class,'index'])->middleware('auth');
Route::post('/admin-post', [AdminPostController::class,'store'])->middleware('auth');
Route::post('/admin-post/{post}', [AdminPostController::class,'destroy'])->middleware('auth');
Route::get('/admin-post-edit/{post}', [AdminPostController::class,'showedit'])->middleware('auth');
Route::post('/admin-post-edit/{post}', [AdminPostController::class,'edit'])->middleware('auth');





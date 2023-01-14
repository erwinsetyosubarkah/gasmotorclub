<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KlienkamiController;
use App\Http\Controllers\KontakkamiController;
use App\Http\Controllers\ProdukkamiController;
use App\Http\Controllers\VisidanmisiController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminGaleryController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminMyclientController;
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
Route::get('/profile', [ProfileController::class,'index']);
Route::get('/visidanmisi', [VisidanmisiController::class,'index']);
Route::get('/produkkami', [ProdukkamiController::class,'index']);
Route::get('/produkkami/{produkkami}', [ProdukkamiController::class,'show']);
Route::get('/artikel', [ArtikelController::class,'index']);
Route::get('/artikel/{artikel}', [ArtikelController::class,'show']);
Route::get('/event', [EventController::class,'index']);
Route::get('/event/{event}', [EventController::class,'show']);
Route::get('/galery', [GaleryController::class,'index']);
Route::get('/klienkami', [KlienkamiController::class,'index']);
Route::get('/kontakkami', [KontakkamiController::class,'index']);

// route Admin
Route::get('/admin',  [AdminHomeController::class,'index'])->middleware('auth');

Route::get('/admin-login', [AdminLoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/admin-login', [AdminLoginController::class,'authenticate'])->middleware('guest');
Route::post('/admin-logout', [AdminLoginController::class,'logout'])->middleware('auth');
Route::get('/admin-register', [AdminRegisterController::class,'index'])->middleware('guest');
Route::post('/admin-register', [AdminRegisterController::class,'store'])->middleware('guest');

Route::get('/admin-profile', [AdminProfileController::class,'index'])->middleware('admin');
Route::post('/admin-profile', [AdminProfileController::class,'edit'])->middleware('admin');

Route::get('/admin-visidanmisi', [AdminVisidanmisiController::class,'index'])->middleware('admin');
Route::post('/admin-visidanmisi', [AdminVisidanmisiController::class,'edit'])->middleware('admin');

Route::get('/admin-myproduct', [AdminMyproductController::class,'index'])->middleware('admin');
Route::post('/admin-myproduct', [AdminMyproductController::class,'store'])->middleware('admin');
Route::post('/admin-myproduct/{myproduct}', [AdminMyproductController::class,'destroy'])->middleware('admin');
Route::get('/admin-myproduct-edit/{myproduct}', [AdminMyproductController::class,'showedit'])->middleware('admin');
Route::post('/admin-myproduct-edit/{myproduct}', [AdminMyproductController::class,'edit'])->middleware('admin');

Route::get('/admin-category', [AdminCategoryController::class,'index'])->middleware('admin');
Route::post('/admin-category', [AdminCategoryController::class,'store'])->middleware('admin');
Route::post('/admin-category/{category}', [AdminCategoryController::class,'destroy'])->middleware('admin');
Route::get('/admin-category-alldata', [AdminCategoryController::class,'allData'])->middleware('admin');
Route::get('/admin-category-edit/{category}', [AdminCategoryController::class,'showedit'])->middleware('admin');
Route::post('/admin-category-edit/{category}', [AdminCategoryController::class,'edit'])->middleware('admin');

Route::get('/admin-post', [AdminPostController::class,'index'])->middleware('auth');
Route::post('/admin-post', [AdminPostController::class,'store'])->middleware('auth');
Route::post('/admin-post/{post}', [AdminPostController::class,'destroy'])->middleware('auth');
Route::get('/admin-post-edit/{post}', [AdminPostController::class,'showedit'])->middleware('auth');
Route::post('/admin-post-edit/{post}', [AdminPostController::class,'edit'])->middleware('auth');

Route::get('/admin-event', [AdminEventController::class,'index'])->middleware('admin');
Route::post('/admin-event', [AdminEventController::class,'store'])->middleware('admin');
Route::post('/admin-event/{event}', [AdminEventController::class,'destroy'])->middleware('admin');
Route::get('/admin-event-edit/{event}', [AdminEventController::class,'showedit'])->middleware('admin');
Route::post('/admin-event-edit/{event}', [AdminEventController::class,'edit'])->middleware('admin');

Route::get('/admin-galery', [AdminGaleryController::class,'index'])->middleware('auth');
Route::post('/admin-galery', [AdminGaleryController::class,'store'])->middleware('auth');
Route::post('/admin-galery/{galery}', [AdminGaleryController::class,'destroy'])->middleware('auth');
Route::get('/admin-galery-edit/{galery}', [AdminGaleryController::class,'showedit'])->middleware('auth');
Route::post('/admin-galery-edit/{galery}', [AdminGaleryController::class,'edit'])->middleware('auth');

Route::get('/admin-myclient', [AdminMyclientController::class,'index'])->middleware('admin');
Route::post('/admin-myclient', [AdminMyclientController::class,'store'])->middleware('admin');
Route::post('/admin-myclient/{myclient}', [AdminMyclientController::class,'destroy'])->middleware('admin');
Route::get('/admin-myclient-edit/{myclient}', [AdminMyclientController::class,'showedit'])->middleware('admin');
Route::post('/admin-myclient-edit/{myclient}', [AdminMyclientController::class,'edit'])->middleware('admin');

Route::get('/admin-user', [AdminUserController::class,'index'])->middleware('admin');
Route::post('/admin-user', [AdminUserController::class,'store'])->middleware('admin');
Route::post('/admin-user/{user}', [AdminUserController::class,'destroy'])->middleware('admin');
Route::get('/admin-user-edit/{user}', [AdminUserController::class,'showedit'])->middleware('admin');
Route::post('/admin-user-edit/{user}', [AdminUserController::class,'edit'])->middleware('admin');





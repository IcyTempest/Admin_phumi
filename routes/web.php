<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware("AdminAuth");
Route::get('/report', [AdminController::class, 'report'])->name('admin.report')->middleware("AdminAuth");

Route::get('/login',[AdminController::class, 'login'])->name('admin.login');
Route::post('/login/authLogin', [AdminController::class, 'authLogin'])->name('admin.authLogin');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout')
->middleware("AdminAuth");


Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
Route::get('/search', [AdminController::class, 'search'])->name('admin.search');
Route::post('/register/authRegister', [AdminController::class, 'authRegister'])->name('admin.authRegister');

Route::get('/following/{id}', [AdminController::class, 'following'])->name('admin.following')->middleware("AdminAuth");

Route::get('/follower/{id}', [AdminController::class, 'followers'])->name('admin.follower')->middleware("AdminAuth");

Route::get('/posts/{id}', [AdminController::class, 'posts'])->name('admin.post')->middleware("AdminAuth");

Route::get('/shares/{id}', [AdminController::class, 'shares'])->name('admin.share')->middleware("AdminAuth");

Route::get('/delete_accounts/{id}', [AdminController::class, 'delete_accounts'])->name('admin.delete_account')->middleware("AdminAuth");

Route::post('/change_password/{id}', [AdminController::class, 'change_password'])->name('admin.change_password')->middleware("AdminAuth");

Route::post('/delete_posts/{id}', [AdminController::class, 'delete_posts'])->name('admin.delete_post')->middleware("AdminAuth");

Route::get('/user/{id}/', [AdminController::class, 'show'])->name('admin.show')->middleware("AdminAuth");


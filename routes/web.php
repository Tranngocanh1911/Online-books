<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showFormLogin'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('register',[LoginController::class,'showFormRegister'])->name('register');
    Route::post('register',[LoginController::class,'register'])->name('admin.register');
   Route::middleware('auth')->group(function () {
        Route::prefix('books')->group(function (){
            Route::get('/list',[BookController::class,'list'])->name('books.list');

            Route::get('/create',[BookController::class,'create'])->name('books.create');
            Route::post('/create',[BookController::class,'store']);

            Route::get('/edit',[BookController::class,'edit'])->name('books.edit');
            Route::post('/edit',[BookController::class,'update'])->name('books.update');

            Route::get('/destroy',[BookController::class,'destroy'])->name('books.destroy');
        });
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('create', [UserController::class, 'create'])->name('users.create');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::post('/{id}/edit', [UserController::class, 'update'])->name('users.update');
            Route::post('create', [UserController::class, 'store'])->name('users.store');
            Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
        });
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::get('/', function () {
            return view('admin.dashboard');
        });
    });
});


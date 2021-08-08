<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
        Route::get('register', [LoginController::class, 'showFormRegister'])->name('register');
        Route::post('register', [LoginController::class, 'register'])->name('admin.register');
        Route::get('/auth/redirect', [LoginController::class, 'redirectToGoogle'])->name('login.google');
        Route::get('/auth/callback', [LoginController::class, 'handleGoogleCallback']);
        Route::middleware('auth')->group(function () {
            Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

            Route::prefix('books')->group(function () {
                Route::get('/list', [BookController::class, 'list'])->name('books.list');

                Route::get('/create', [BookController::class, 'create'])->name('books.create');
                Route::post('/create', [BookController::class, 'store']);

                Route::get('/create', [BookController::class, 'create'])->name('books.create');
                Route::post('/create', [BookController::class, 'cre']);

                Route::get('/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
                Route::post('/edit/{id}', [BookController::class, 'update']);

                Route::get('/destroy/{id}', [BookController::class, 'destroy'])->name('books.destroy');
            });

            Route::prefix('authors')->group(function () {
                Route::get('/list', [AuthorController::class, 'list'])->name('authors.list');

                Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
                Route::post('/create', [AuthorController::class, 'cre']);

                Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
                Route::post('/edit/{id}', [AuthorController::class, 'update']);

                Route::get('/destroy/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
            });

            Route::prefix('categories')->group(function () {
                Route::get('/list', [CategoryController::class, 'list'])->name('categories.list');
                Route::get('/edit', [BookController::class, 'edit'])->name('books.edit');
                Route::post('/edit', [BookController::class, 'update'])->name('books.update');

                Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
                Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'cre']);
                Route::get('/destroy', [BookController::class, 'destroy'])->name('books.destroy');
            });
            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('users.index');
                Route::get('create', [UserController::class, 'create'])->name('users.create');
                Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
                Route::post('/{id}/edit', [UserController::class, 'update'])->name('users.update');
                Route::post('create', [UserController::class, 'store'])->name('users.store');
                Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
            });

            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('categories.update');

            Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });

        Route::get('/', function () {
            return view('backends.admin.dashboard');
        });
    });


//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

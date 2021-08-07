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


    Route::prefix('admin')->group(function () {
        Route::get('login', [LoginController::class, 'showFormLogin'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('admin.login');
        Route::get('register', [LoginController::class, 'showFormRegister'])->name('register');
        Route::post('register', [LoginController::class, 'register'])->name('admin.register');


        Route::middleware('auth')->group(function () {

            Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

            Route::prefix('books')->group(function () {
                Route::get('/list', [BookController::class, 'list'])->name('books.list');

                Route::get('/create', [BookController::class, 'create'])->name('books.create');
                Route::post('/create', [BookController::class, 'store']);

                Route::get('/create', [\App\Http\Controllers\BookController::class, 'create'])->name('books.create');
                Route::post('/create', [\App\Http\Controllers\BookController::class, 'cre']);

                Route::get('/edit/{id}', [\App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
                Route::post('/edit/{id}', [\App\Http\Controllers\BookController::class, 'update']);

                Route::get('/destroy/{id}', [\App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
            });

            Route::prefix('authors')->group(function () {
                Route::get('/list', [\App\Http\Controllers\AuthorController::class, 'list'])->name('authors.list');

                Route::get('/create', [\App\Http\Controllers\AuthorController::class, 'create'])->name('authors.create');
                Route::post('/create', [\App\Http\Controllers\AuthorController::class, 'cre']);

                Route::get('/edit/{id}', [\App\Http\Controllers\AuthorController::class, 'edit'])->name('authors.edit');
                Route::post('/edit/{id}', [\App\Http\Controllers\AuthorController::class, 'update']);

                Route::get('/destroy/{id}', [\App\Http\Controllers\AuthorController::class, 'destroy'])->name('authors.destroy');
            });

            Route::prefix('categories')->group(function () {
                Route::get('/list', [\App\Http\Controllers\CategoryController::class, 'list'])->name('categories.list');
                Route::get('/edit', [BookController::class, 'edit'])->name('books.edit');
                Route::post('/edit', [BookController::class, 'update'])->name('books.update');

                Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
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

            Route::get('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');

            Route::get('/destroy/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
        });

        Route::get('/', function () {
            return view('admin.dashboard');
        });
    });
});

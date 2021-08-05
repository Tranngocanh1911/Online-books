<?php

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

Route::prefix('books')->group(function (){
    Route::get('/list',[\App\Http\Controllers\BookController::class,'list'])->name('books.list');

    Route::get('/create',[\App\Http\Controllers\BookController::class,'create'])->name('books.create');
    Route::post('/create',[\App\Http\Controllers\BookController::class,'store']);

    Route::get('/edit',[\App\Http\Controllers\BookController::class,'edit'])->name('books.edit');
    Route::post('/edit',[\App\Http\Controllers\BookController::class,'update'])->name('books.update');

    Route::get('/destroy',[\App\Http\Controllers\BookController::class,'destroy'])->name('books.destroy');
});

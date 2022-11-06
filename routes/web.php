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
    return redirect('/books');
});

Route::get("/books", [\App\Http\Controllers\BookController::class, 'index'] );

Route::get("/book/show/{book}", [\App\Http\Controllers\BookController::class, 'show'] );

Route::get("/book/add", [\App\Http\Controllers\BookController::class, 'create'] );

Route::post("/book/add", [\App\Http\Controllers\BookController::class, 'store'] );

Route::get("/book/edit/{book}", [\App\Http\Controllers\BookController::class, 'edit'] );

Route::post("/book/edit/{book}", [\App\Http\Controllers\BookController::class, 'update'] );

Route::get("/book/test/{book}", [\App\Http\Controllers\BookController::class, 'test'] );

Route::get("/book/delete/{book}", [\App\Http\Controllers\BookController::class, 'delete'] );

Route::post("/book/delete/{book}", [\App\Http\Controllers\BookController::class, 'destroy'] );

Route::get("/authors", [\App\Http\Controllers\AuthorController::class, 'index'] );

// author
Route::get("/author/show/{author}", [\App\Http\Controllers\AuthorController::class, 'show'] );

Route::get("/author/add", [\App\Http\Controllers\AuthorController::class, 'create'] );

Route::post("/author/add", [\App\Http\Controllers\AuthorController::class, 'store'] );

Route::get("/author/edit/{author}", [\App\Http\Controllers\AuthorController::class, 'edit'] );

Route::post("/author/edit/{author}", [\App\Http\Controllers\AuthorController::class, 'update'] );

Route::get("/author/delete/{author}", [\App\Http\Controllers\AuthorController::class, 'delete'] );

Route::post("/author/delete/{author}", [\App\Http\Controllers\AuthorController::class, 'destroy'] );
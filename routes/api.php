<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/getBooks", [\App\Http\Controllers\BookController::class, 'getBooks'] );

Route::post("/createAuthor", [\App\Http\Controllers\AuthorController::class, 'createAuthor'] );

Route::get("/getAuthor", [\App\Http\Controllers\AuthorController::class, 'getAuthor'] );
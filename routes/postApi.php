<?php

use App\Http\Controllers\PostController;
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

Route::get('/posts',         [PostController::class, 'index']);
Route::get('/post/{id}',     [PostController::class, 'show'])->name('show-post');
Route::post('/posts',        [PostController::class, 'store'])->name('create-post');
Route::post('/posts/{id}',   [PostController::class, 'update'])->name('update-post');
Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('delete-post');
Route::post('/posts-filter', [PostController::class, 'indexByFilter'])->name('filter-post');

<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WriterController;
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
Route::middleware('auth:api')->group(function () {

Route::resource('/posts', PostController::class);
Route::post('/posts/{id}/comments', [CommentController::class, 'store']);
Route::post('/posts/{id}/tags', [TagController::class, 'store']);
});

Route::post('/writers/register', [WriterController::class, 'register']);
Route::post('/writers/login', [WriterController::class, 'login']);
Route::get('/writers/{id}/posts', [WriterController::class, 'getPosts']);
Route::get('/posts/{id}/tags', [TagController::class, 'index']);
Route::get('/posts/{id}/comments', [CommentController::class, 'index']);

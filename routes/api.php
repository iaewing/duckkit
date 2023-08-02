<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(UserController::class)->group(function () {
    Route::get('/user/{id}', 'show')->name('user.show');
    Route::get('/user', 'index')->name('user.index');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{id}', 'show')->name('posts.show');
    Route::get('posts/{id}/comments', 'comments')->name('posts.comments');
    Route::post('/posts', 'store')->name('posts.store');
    Route::patch('/posts', 'update')->name('posts.update');
    Route::post('/posts/{id}/vote', 'vote')->name('posts.vote');
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/comments', 'index')->name('comments.index');
    Route::get('/comments/{id}', 'show')->name('comments.show');
    Route::post('/comments', 'store')->name('comments.store');
    Route::patch('/comments', 'update')->name('comments.update');
});

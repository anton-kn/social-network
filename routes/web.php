<?php

use App\Http\Controllers\ReplayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/profile/{id?}', [UserController::class, 'index']);
Route::post('/profile/add-comment/{id?}', [UserController::class, 'addComment'])->name('profile.addComment');

Route::delete('/profile/{comment}', [UserController::class, 'destroy'])->name('profile.destroy');
Route::delete('/profile/replay/{replayId}', [UserController::class, 'destroyReplay'])->name('profile.destroyReplay');
Route::get('/profile/deleting/user/comments/{id}', [UserController::class, 'deletingUserComments']);

/* загружаем данные с помощью Ajax */
Route::get('/profile/additional/data/{id?}', [CommentController::class, 'store']);

Route::get('/profile/user/comments', [UserController::class, 'showComments']);

Route::get('/profile/replay/{commentId}', [ReplayController::class, 'index']);
Route::post('/profile/replay/add/{commentId}', [ReplayController::class, 'addReplay'])->name('replay.addReplay');


Route::get('/test', [TestController::class, 'test']);
Route::get('/test/hello/{id}', [TestController::class, 'exapmleAjax']);



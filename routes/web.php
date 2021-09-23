<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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

Route::get('/profile/{id?}', [UserController::class, 'index'])->name('profile');
Route::post('/profile/{id?}', [UserController::class, 'addComment']);
Route::post('/profile/{id?}', [UserController::class, 'replay'])->name('replay');

Route::delete('/profile/{comment}', [UserController::class, 'destroy'])->name('profile.destroy');

Route::get('/test', [TestController::class, 'test']);
Route::post('/test', [TestController::class, 'testValidate']);



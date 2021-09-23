<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
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

Route::get('/profile/{id?}', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/{id?}', [ProfileController::class, 'add']);

Route::get('/test', [TestController::class, 'test']);
Route::post('/test', [TestController::class, 'testValidate']);



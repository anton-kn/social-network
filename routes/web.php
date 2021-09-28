<?php

use App\Http\Controllers\ReplayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AccessBookController;
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


/* Библиотека с книгами */
Route::get('/library/books', [BookController::class, 'index'])->name('books');
/* Новая книга */
Route::get('/library/book', [BookController::class, 'book'])->name('book');
Route::post('/library/new/book', [BookController::class, 'newBook'])->name('new-book');
/* Читаем книгу */
Route::get('/library/read/book/{id}', [BookController::class, 'read'])->name('read-book');
/* Редактируем книгу */
Route::get('/library/edit/book/{id}', [BookController::class, 'edit'])->name('edit-book');
Route::post('/library/edit/book/{id}', [BookController::class, 'change'])->name('change-book');

/* Удаляем книгу */
Route::get('/library/remove/book/{id}', [BookController::class, 'remove'])->name('remove-book');

/* Устанавливаем доступ к библиотекам */
Route::get('/library/access/enable/books/{clientId}', [AccessBookController::class, 'enable'])
->name('enable-access-books');
Route::get('/library/access/disable/books/{clientId}', [AccessBookController::class, 'disable'])
->name('disable-access-books');

/*Книги доступны всем*/
Route::get('/library/books/all/{bookId}', [BookController::class, 'accessBookAll'])
		->name('access-book-all');

Route::get('/library/show/books', [BookController::class, 'showBooksAll'])
		->middleware('availablebook')
		->name('show-books-all');

/*Route::get('/test', [TestController::class, 'test']);
Route::get('/test/hello/{id}', [TestController::class, 'exapmleAjax']);*/



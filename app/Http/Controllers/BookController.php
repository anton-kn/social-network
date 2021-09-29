<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;


class BookController extends Controller
{
    // Список всех книг
    public function index()
    {
        // dd($request->path());
        return view('libraryBooks.books', 
            [
                'books' => User::find(Auth::id())->books,
            ]);
    }

    /* Книги других пользователей */
    public function booksOther($userId)
    {
        $this->checkUser($userId);

        return view('libraryBooks.books-other', 
            [
                'books' => User::find($userId)->books,
            ]);
    }

    public function read(Book $book, $id)
    {    
        // dd( Book::find($id) );
        $book = User::find(Auth::id())->books->where('id' , '=' , $id)->first();
        /* Проверка существования книги у текущего пользователя*/
        if($book == null){
            return back();
        }

        return view('libraryBooks.read-book', 
            [
                'book' => $book,
            ]);
    }

    // форма для создания книг
    public function book(){
        return view('libraryBooks.create-book');
    }

    // форма для редактирования книги
    public function edit($id){

        $book = User::find(Auth::id())->books->where('id' , '=' , $id)->first();
        /* Проверка существования книги у текущего пользователя*/
        if($book == null){
            return back();
        }

        return view('libraryBooks.edit-book', [
            'book' => $book,
        ]);   
    }

    /* Изменяем книгу */
    public function change(Request $request, $id)
    {
        $book = User::find(Auth::id())->books->where('id' , '=' , $id)->first();
        /* Проверка существования книги у текущего пользователя*/
        if($book == null){
            return back();
        }

        $book->title = $request->title;
        $book->text = $request->text;
        $book->save();

        return back()->with('status', 'Изменения прошли успешно');
    }

    /* Записываем книгу */
    public function newBook(Request $request)
    {
        /* Выполнить проверку на сущестрования id */
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        Book::create([
            'user_id' => Auth::id(),  // принадлежность книги
            'title' => $request->title, 
            'text' => $request->text,
            'status' => false        // ссылка на книгу закрыта
        ]);

        return back()->with('status', 'Книга записана!');
    }

    public function remove($id)
    {
        $book = User::find(Auth::id())->books->where('id' , '=' , $id)->first();
        /* Проверка существования книги у текущего пользователя*/
        if($book == null){
            return back();
        }
        
        $book->delete();
        return back()->with('status', 'Книга удалена!');
    }

    /* устанавливаем статус книге - Книга по ссылке доступна для всех */
    public function accessBookAll($bookId)
    {
        $book = Book::where('id', '=', $bookId)->first();
        /* Проверяем наличие книги */
        if($book == null){
            return back();
        }

        $book->status = true;
        $book->save();
        return back()->with('status' , 'Книга доступна всем');
    }

    /* Список книг, который доступен всем */
    public function booksForGuest()
    {
        $books = Book::where('status' , '=', true)->get();
        // dd($books);

        return view('libraryBooks.available-books', [
            'books' => $books,
        ]);
    }


}

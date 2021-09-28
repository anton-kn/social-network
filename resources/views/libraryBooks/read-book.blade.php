@extends('layouts.app')
@section('content')
    <div class="content m-4">
        <div class="position-relative h-auto">
            <x-side-panel-create-book/>
            <div class="comment_main position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Содержание книги</h2>
                <div class="title border border-1 m-2 p-2">
                    <h4 class="mx-3">{{ $book->title }}</h4>
                    <p class="m-3">{{ $book->text }}</p>                  
                </div>
                 <a href="{{ route('books') }}">Назад в библиотеку</a>
            </div>
        </div>
    </div>
@endsection

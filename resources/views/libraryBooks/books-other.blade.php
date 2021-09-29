@extends('layouts.app')

@section('content')
    <div class="content m-4">
        <div class="position-relative h-auto">
            <x-side-panel-books/>
            <div class="comment_main position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Список книг {{$books[0]->user->name}}</h2>
                <div class="title border border-1 m-2">
                    <ol>
                        @foreach($books as $book)
                            <li>
                                <div class="book-title border border-1 m-2 p-3">
                                    {{-- Названия книг --}}
                                    <h3 class="mx-3">{{ $book->title }}</h3>
                                    <p>{{ $book->text }}</p>
                                </div>
                             </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

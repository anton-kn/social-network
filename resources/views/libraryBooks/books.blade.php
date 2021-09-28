@extends('layouts.app')

@section('content')
    <div class="content m-4">
        <div class="position-relative h-auto">
            <x-side-panel-books/>
            <div class="comment_main position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Список книг</h2>
                @if(session('status'))
                    <p style="color:green">{{ session('status') }}</p>
                @endif
                <div class="title border border-1 m-2">
                    <ol>
                        @foreach($books as $book)
                            <li>
                                <div class="book-title border border-1 m-2">
                                    {{-- Названия книг --}}
                                    <p class="mx-3">{{ $book->title }}</p>
                                </div>
                                <div class="control mx-2">
                                    <a class="mx-3 btn btn-info" href="{{ route('read-book', ['id' => $book->id]) }}">Прочитать</a>
                                    <a class="mx-3 btn btn-info" href="{{ route('edit-book', ['id' => $book->id]) }}">Редактировать</a>
                                    <a class="mx-3 btn btn-secondary" href="{{ route('remove-book', ['id' => $book->id]) }}">Удалить</a>
                                    <a class="mx-3 btn btn-link" href="{{route('access-book-all', ['bookId' => $book->id])}}">Книга по ссылке доступна для всех</a>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

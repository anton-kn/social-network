@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <header>
            <div class="pricing-header p-3 pb-md-4 mx-auto">
                <h1 class="display-4 fw-normal">Библиотека книг</h1>
                @foreach($books as $book)
                    <div class = "book">
                        <h3>{{ $book->title }}</h3>
                        <div class="text">
                            <p>{{ $book->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </header>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">© 2021</small>
                </div>
            </div>
        </footer>
    </div>
@endsection
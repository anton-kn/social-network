@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">Социальная сеть</h1>
                <p class="fs-5 text-muted">Социальная сеть с использованием Laravel</p>
            </div>
            <div class="lists-books">
                <a class="link-success fs-5" href="{{ route('show-books-all') }}">Библиотека книг</a>
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


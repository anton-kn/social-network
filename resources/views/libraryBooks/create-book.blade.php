@extends('layouts.app')

@section('content')
    <div class="content m-4">
        <div class="position-relative h-auto">

            <x-side-panel-create-book/>
            
            <div class="comment_main position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Новая книга</h2>
                @if(session('status'))
                    <p style="color:green;">{{ session('status') }}</p>
                @endif
                <div class="title border border-1 m-2">
                    <form method="post" action="{{ route('new-book') }}">
                    @csrf
                    <div class="m-3">
                        <label for="exampleFormControlInput1" class="form-label">Название книги</label>
                        <input type="text" name="title" value="" class="form-control" id="exampleFormControlInput1"
                               placeholder="Введитете заголовок">
                        @error('title')
                        <div class="link-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
                        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  placeholder="Введите текст сообщения"></textarea>
                        @error('text')
                        <div class="link-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info m-3" >Отправить</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
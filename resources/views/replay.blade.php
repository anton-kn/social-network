@extends('layouts.app')

@section('content')
    <div class="m-4">
        <div class="position-relative h-auto">
            <x-side-panel-replay :users="$users"/>
            <div class="position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Ответ на комментарий</h2>
                <div class="comment border border-1 my-2 p-3">
                    <div class="topic">
                        <div class="text-primary">
                            <h3 class="text-dark">Ответ для {{ $comment->user->name }}</h3>
                        </div>
                        <h5>{{ $comment->topic }}</h5>
                    </div>
                    <p>{{ $comment->comment }}</p>
                </div>
                <div class="w-50 p-xl-3" style="display: block;">
                    {{-- Пишем ответ на комментарий --}}
                    <form method="post" action="{{ route('replay.addReplay' , ['commentId' => $comment->id]) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                            <input type="text" name="topic" value="" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Введитете заголовок">
                            @error('topic')
                            <div class="link-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Текст сообщения</label>
                            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      placeholder="Введите текст сообщения"></textarea>
                            @error('comment')
                            <div class="link-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info" >Ответить</button>
                    </form>
                </div>
{{--                <x-form/>--}}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <div class="pricing-header p-3 pb-md-4 mx-auto">
            {{-- Имя текущего профиля--}}
            <h2 class="fw-normal">Страница {{ $pageUser->name }}</h2>
        </div>
        <div class="position-relative h-auto">
            <x-side-panel :users="$users"/>
            <div class="position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Коментарии</h2>
                @if(session('status'))
                    <div class="comment border border-1 m-2 p-3" style="color: red">{{ session('status') }}</div>
                @endif
                @if(session('errorExist'))
                    <div class="comment border border-1 m-2 p-3" style="color: red">{{ session('errorExist') }}</div>
                @endif

                <form method="post" action="{{ route('profile.addComment', ['id' => $pageUser->id]) }}">
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
                    <button type="submit" class="btn btn-info" >Отправить</button>
                </form>
                @foreach($comments as $comment)
                    {{-- Отображаем только комметарии --}}
                    @if($comment->comment_id == null)
                        @if(session('statusComment'))
                            <div class="comment border border-1 m-2 p-3" style="color: red">{{ session('statusComment') }}</div>
                        @endif
                        {{-- Блок для комментария --}}
                        <div class="comment border border-1 m-2 p-3">
                            <div class="topic">
                                <div class="text-primary">
                                    <h3 class="text-dark">{{ \App\Models\User::find($comment->author_id)->name }}</h3>
                                </div>
                                <h5>{{ $comment->topic }}</h5>
                            </div>
                            <p>{{ $comment->comment }}</p>
                            {{-- Если текущий пользователь оставил комментарий на чужом профиле
                             или на своем профиле, отображаем кнопку Удалить --}}
                            @if(Auth::id() == $comment->author_id || Auth::id() == $pageUser->id)
                                <form method="post" action="{{ route('profile.destroy', $comment) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Удалить</button>
                                </form>
                            @endif
                            <a class="btn btn-link"
                               href="/profile/replay/{{ $comment->id}}">Ответить</a>
                        </div>
                    @endif
                    {{-- Отображаем ответы к комметарию --}}
                    @foreach($commentsAll as $replay)
                        @if($comment->id == $replay->comment_id)
                            <div class="border border-1 ml-5 w-60 py-2 px-3">
                                {{-- Автор комментария --}}
                                <h4>{{ \App\Models\User::find($replay->author_id)->name }}</h4>
                                <h5>{{ $replay->topic }}</h5>
                                <p> {{ $replay->comment }} </p>
                                @if(Auth::id() == $replay->author_id || Auth::id() == $pageUser->id)
                                    <form method="post" action="
{{ route('profile.destroyReplay' , ['replayId' => $replay->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link">Удалить</button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection

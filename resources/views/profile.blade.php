@extends('layouts.app')

@section('content')
    <div class="m-4">
        <div class="pricing-header p-3 pb-md-4 mx-auto">
            {{-- Имя текущего профиля --}}
            <h2 class="fw-normal">Страница {{ $pageUser->name }}</h2>
        </div>
        <div class="position-relative h-auto">
            <div class="position-absolute top-0 start-0 border border-1 w-25 p-3">
                <h2>Содержание</h2>
                <div class="comment">
                    <a href="">Мои коментарии</a><br/>
                    <a href="">Удалить все коментарии</a><br/>
                </div>
                <div class="users">
                    <h4>Все пользователи</h4>
                    {{-- Показываем список всех авторизованных пользователей --}}
                    @foreach($users as $user)
                        <a href="/profile/{{ $user->id }}">{{ $user->name }}</a><br/>
                    @endforeach
                </div>
            </div>
            <div class="position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Коментарии</h2>
                <form method="post" action="">
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
                {{-- Показываем все посты --}}
                @foreach($comments as $comment)
                    <div class="comment border border-1 my-2 p-3">
                        <div class="topic">
                            <div class="text-primary">
                                <p>Автор {{ $comment->author_id }}</p>
                            </div>
                            <p>{{ $comment->topic }}</p>
                        </div>
                        <p>{{ $comment->comment }}</p>
                        {{-- Если текущий пользователь оставил комментарий на чужом профиле
                         или на своем профиле--}}
                        @if(Auth::id() == $comment->author_id || Auth::id() == $pageUser->id)
                            <form method="post" action="{{ route('profile.destroy', $comment) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Удалить</button>
                            </form>
                        @endif
                        <form method="post" action="{{ route('replay') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">Ответить</button>
                        </form>
                        {{--  Ответ к комментарию  --}}
                        <div class="w-50 p-xl-3" style="display: block;">
                            <form method="post" action="">
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
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

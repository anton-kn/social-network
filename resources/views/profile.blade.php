@extends('layouts.app')

@section('content')
    <div class="m-4">
        <div class="pricing-header p-3 pb-md-4 mx-auto">
            <h2 class="display-4 fw-normal">{{ Auth::user()->name }}</h2>
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
                    <a href="">Gvin</a><br/>
                    <a href="">Pin</a>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Коментарии</h2>
                <form type="POST" action="{{ route('profile') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               placeholder="Введитете заголовок">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Текст сообщения</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  placeholder="Введите текст сообщения"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info" >Отправить</button>
                </form>
            </div>
        </div>
    </div>

@endsection

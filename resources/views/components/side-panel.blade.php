<div class="position-absolute top-0 start-0 border border-1 w-25 p-3">
    <h2>Содержание</h2>
    <div class="comment">
        <a href="/profile/user/comments">Мои коментарии</a><br/>
        <a href="/profile/deleting/user/comments/{{ Auth::id() }}">Удалить все комментарии</a><br/>
    </div>
    <div class="users my-2">
        <h4>Все пользователи</h4>
        {{-- Показываем список всех авторизованных пользователей --}}
        @foreach($users as $user)
            <a href="/profile/{{ $user->id }}">{{ $user->name }}</a><br/>
        @endforeach
    </div>
    
    <div class = "books my-3">
        <h4>Библиотека</h4>
        <a href="{{ route('books') }}">Библиотека</a>
    </div>
    @if($pageUser->id != Auth::id())
        <div class = "books my-3">
            <h4>Моя библиотека</h4>
            {{-- Проверяем есть ли доступ к библиотеке --}}
            @if( \App\Models\User::find(Auth::id())->accesses->where('client_id', '=', $pageUser->id)->first() )
                <a class="btn btn-danger" href="{{ route('disable-access-books', ['clientId' => $pageUser->id]) }}">Отключить доступ к библиотеке</a>
            @else
                <a class="btn btn-success" href="{{ route('enable-access-books', ['clientId' => $pageUser->id]) }}">Дать доступ к библиотеке</a>
            @endif
        </div>
    @endif
</div>

<div class="position-absolute top-0 start-0 border border-1 w-25 p-3">
    <h2>Содержание</h2>
    <div class="comment">
        <a href="">Мои коментарии</a><br/>
        <a href="/profile/deleting/user/comments/{{ Auth::id() }}">Удалить все комментарии</a><br/>
    </div>
    <div class="users">
        <h4>Все пользователи</h4>
        {{-- Показываем список всех авторизованных пользователей --}}
        @foreach($users as $user)
            <a href="/profile/{{ $user->id }}">{{ $user->name }}</a><br/>
        @endforeach
    </div>
</div>

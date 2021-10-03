@extends('layouts.app')
@section('content')
    <div class="m-4">
        <div class="position-relative h-auto">
            <x-side-panel-replay :users="$users" />
            <div class="position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Все коментарии</h2>
                @if($comments->count() == 0)
                    <p style="color:#6a0606;">Комментарии отсутствуют</p>
                @endif
                @foreach($comments as $comment)
                    <div class="border border-1 p-3 m-1">
                        <h5>{{ $comment->topic }}</h5>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
                <h2>Все ответы на комметарии</h2>
                @if($replays->count() == 0)
                    <p style="color:#6a0606;">Ответы отсутствуют</p>
                @endif
                @foreach($replays as $replay)
                    <div class="border border-1 p-3 m-1">
                        <h5>{{ $replay->topic }}</h5>
                        <p>{{ $replay->comment }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

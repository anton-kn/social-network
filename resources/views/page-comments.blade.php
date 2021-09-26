@extends('layouts.app')
@section('content')
    <div class="m-4">
        <div class="position-relative h-auto">
            {{--  --}}
            <x-side-panel :users="$users"/>
            <div class="position-absolute top-0 end-0 border border-1 w-75 p-3">
                <h2>Коментарии</h2>
                @foreach($comments as $comment)
                    <div class="border border-1 p-3 m-1">
                        <h5>{{ $comment->topic }}</h5>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

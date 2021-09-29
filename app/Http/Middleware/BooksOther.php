<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AccessBook;
use Illuminate\Support\Facades\Auth;

class BooksOther
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $userId)
    {
        /* 
        * Проверяем сущестование доступа у зарегистрированного пользователя
        * к библиотеке друго пользователя
        * user_id - тот, кто дал доступ
        * client_id - тот, кому дали доступ
        */
        $acc = AccessBook::where('user_id', '=', $request->$userId)
            ->get()
            ->where('client_id', '=', Auth::id())
            ->first();
        if($acc != null){
            return $next($request);
        }

        return back()->with('status', 'У вас нет доступа к этой библиотеке');
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessBook;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class AccessBookController extends Controller
{

    /* Доступ к библиотеке */
    public function enable($clientId)
    {
        $user = User::where('id', '=', $clientId)->first();

        /* Подключаем доступ к библиотеке */
        if (isset($user->id) == true) {
            AccessBook::create([
                'user_id' => Auth::id(),
                'client_id' => $user->id
            ]);
        }

        return back();
    }

    /* Отключаем доступ к библиотеке */
    public function disable($clientId)
    {
        $user = User::where('id', '=', $clientId)->first();
        /* Если пользователь есть, то удаляем доступ к библиотеке */
        if (isset($user->id) == true) {
            $client = AccessBook::where('client_id', '=', $user->id);
            $client->delete();
        }
        return back();     
    }
}

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

        // dd( $user );

        if($user == null){
            return back();
        }

        AccessBook::create([
            'user_id' => Auth::id(),
            'client_id' => $user->id
        ]);

        return back();
    }

    /* Отключаем доступ к библиотеке */
    public function disable($clientId)
    {
        // dd( User::find(Auth::id())->accesses->where('client_id', '=', $clientId)->first() );

        $user = User::where('id', '=', $clientId)->first();

        if($user == null){
            return back();
        }

        $client = AccessBook::where('client_id', '=', $user->id);
        $client->delete();
        return back();
    }
}

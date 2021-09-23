<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

/*
 * Профиль пользователя
 */
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
//        dd(User::all()[0]->name);
        /* Записываем id текущего пользователя */
        return view('profile', [
            'users' => User::all(),
            'comments' => User::all()[1]->comments(),
        ]);
    }

    public function add(Request $request, $id = null)
    {
        $request->validate([
            'topic' => 'required',
            'comment' => 'required'
        ]);

        if($id){
            $userId = $id;
        }
        else{
            $userId = Auth::id();
        }

        Comment::create([
            'user_id' => $userId,  // кому написали
            'author_id' => Auth::id(), // автор комментария
            'topic' => $request->topic,
            'comment' => $request->comment
        ]);

        return redirect('/profile');
    }
}

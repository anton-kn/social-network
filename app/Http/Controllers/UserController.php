<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id = null)
    {
        $userId = ($id!=null) ?  $id :  Auth::id();
        return view('profile', [
            'users' => User::all(),
            /* Все комментарии */
            'comments' => User::find($userId)->comments,
            /* Страница пользователя */
            'pageUser' => User::find($userId),
        ]);
    }

    public function addComment(Request $request, $id = null)
    {
        $request->validate([
            'topic' => 'required',
            'comment' => 'required'
        ]);

        $userId = ($id!=null) ?  $id :  Auth::id();
        /* Добавляем комментарий */
        $comment = new CommentController();
        $comment->add($request, $userId);

        /* Переходим на страницу, где оставили комментарий */
        return back();
    }

    /* Ответ на комментарий */
    public function replay()
    {
        return "replay";
    }

    /* Удаляем комметарий */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Controllers\CommentController;

class ReplayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* начальная загрузка */
    public function index($commentId)
    {
        return view('replay', [
            'users' => User::all(),
            /* комментарии */
            'comment' => Comment::find($commentId),
        ]);
    }

    /* Ответ к комментарию */
    public function addReplay(Request $request, $id)
    {
        $request->validate([
            'topic' => 'required',
            'comment' => 'required'
        ]);

        $comment = new CommentController();
        $comment->replayToComment($request, $id);

        /* Переходим обратно на страницу пользователя */
        $user = Comment::find($id)->user->id;
        return redirect('profile/' . $user);
    }

}

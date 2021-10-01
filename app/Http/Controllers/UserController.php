<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\AccessBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }


    public function index($id = null)
    {

        /* Выполнить проверку на наличие id */
        $userId = ($id!=null) ?  $id :  Auth::id();

        if (isset($this->user[$userId-1]->id) == false) {
            return back();
        }

        return view('profile', [
            /* Все пользователи */
            'users' => $this->user,
            /* Текущий пользователь */
            'currentUser' => $this->user[$userId-1],
            /* ответы на комметарии */
            'commentsAll' => $this->user[$userId-1]->comments()->where('comment_id', '!=', null)->get(),
            /* количество комментариев */
            'countComments' => $this->user[$userId-1]->comments()->where('comment_id', '=', null)->get()->count(),
        ]);
    }


    /* Удаляем комметарий */
    public function destroy(Comment $comment)
    {
        /* id комментария */
        $commentId = $comment->id;
        /* Поиск ответов на этот комментарий (результат id ответов) */
        $repliesToComment = $comment::where('comment_id', $commentId)->get();
        /* Удаление ответов  на этот комментарий */
        foreach ($repliesToComment as $replay){
            $comment::destroy($replay->id);
        }
        /* Удаляем сам комментарий */
        $comment->delete();
        return back()->with('statusComment', 'Комментарий удален');
    }

    /* Удаляем Ответ на комментарий */
    public function destroyReplay(Comment $comment, $replayId)
    {
        $comment::destroy($replayId);
        return back()->with('statusReplay', 'Комментарий удален');
    }

    /* Удаляем все комментарии */
    public function deletingUserComments($userId)
    {

        if (isset($this->user[$userId-1]->id) == false) {
            return back();
        }


        /* Все комментарии пользователя */
        // $commentAll = User::find($userId)->comments;
        $commentAll = $this->user[$userId-1]->comments;
        /* Удаляем все комментарии */
        foreach ($commentAll as $comment) {
            $comment->delete();
        }
        return back()->with('status', 'Все комментарии удалены');
    }

    /* Все комментарии авторизованного пользователя */
    public function showComments()
    {
        return view('page-comments', [
            'users' => $this->user,
            /* Все комментарии */
            'comments' => $this->user[Auth::id()]->comments,
        ]);
    }

}

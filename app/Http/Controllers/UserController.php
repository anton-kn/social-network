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
        /* Выполнить проверку на существования id */
        $userId = ($id!=null) ?  $id :  Auth::id();
//        dd(User::find($userId)->comments()->where('comment_id', '=', null)->get()->count());
//        dd(User::find($userId)->comments->take(5));
//        dd($userId);
        return view('profile', [
            'users' => User::all(),
            /* Все комментарии */
            'comments' => User::find($userId)->comments->take(5),
            /* Страница текущего пользователя */
            'pageUser' => User::find($userId),
            /* ответы на комметарии */
            'commentsAll' => User::find($userId)->comments()->where('comment_id', '!=', null)->get(),
            /* количество комментариев */
            'countComments' => User::find($userId)->comments()->where('comment_id', '=', null)->get()->count()
        ]);
    }

    /* Добавляем комментарий */
    public function addComment(CommentController $comment, Request $request, $id)
    {
        /* id - номер пользователя, для которого пише комментарий */

        /* Выполнить проверку на сущестрования id */
        $request->validate([
            'topic' => 'required',
            'comment' => 'required'
        ]);

        /* Проверка на сущестования пользователя с таким id */
        if($id != null) // комментарий добавляем не на свою страницу
        {
            $existId = User::find($id);
            if($existId == null || $existId == false ){
                return back()->with('errorExist', 'Нет такого пользователя');
            }
        }

        $userId = ($id!=null) ?  $id :  Auth::id();
        /* Добавляем комментарий */
        // $comment = new CommentController();
        $comment->add($request, $id);
        /* Переходим на страницу, где оставили комментарий */
        return back();
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
        /* Все комментарии пользователя */
        $commentAll = User::find($userId)->comments;
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
            'users' => User::all(),
            /* Все комментарии */
            'comments' => User::find(Auth::id())->comments,
        ]);
    }

}

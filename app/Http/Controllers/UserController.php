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
    }

    public function index($id = null)
    {

        /* Выполнить проверку на наличие id */
        $userId = ($id!=null) ?  $id :  Auth::id();
        
        // $this->checkUser($userId);
        $user = User::where('id' , '=' , $userId)->first();
         // Проверка существования книги у текущего пользователя
        if($user == null){
            return back();
        }

        return view('profile', [
            'users' => User::all(),
            /* Все комментарии */
            'comments' => User::find($userId)->comments->take(5),
            /* Страница текущего пользователя */
            'pageUser' => User::find($userId),
            /* ответы на комметарии */
            'commentsAll' => User::find($userId)->comments()->where('comment_id', '!=', null)->get(),
            /* количество комментариев */
            'countComments' => User::find($userId)->comments()->where('comment_id', '=', null)->get()->count(),
            // 'accesses' => AccessBook::where('client_id', '=', Auth::id())->get()
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

        $user = User::where('id' , '=' , $userId)->first();
         // Проверка существования книги у текущего пользователя
        if($user == null){
            return back();
        }

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

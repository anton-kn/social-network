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
        // dd($this->user->where('id', '=', 1)->first()->comments);
        /* Выполнить проверку на наличие id */
        $userId = ($id!=null) ?  $id :  Auth::id();

        if (isset($this->user->where('id', '=', $userId)->first()->id) == false) {
            return back();
        }

        return view('profile', [
            /* Все пользователи */
            'users' => $this->user,
            /* Текущий пользователь */
            'currentUser' => $this->user->where('id', '=', $userId)->first(),
            /* ответы на комметарии */
            'commentsAll' => $this->user
                ->where('id', '=', $userId)
                ->first()
                ->comments()->where('comment_id', '!=', null)
                ->get(),
            /* количество комментариев */
            'countComments' => $this->user
                ->where('id', '=', $userId)->first()
                ->comments()
                ->where('comment_id', '=', null)
                ->get()->count(),
        ]);
    }


    /* Удаляем комметарий */
    public function destroy(Comment $comment)
    {
        /* id комментария */
        $commentId = $comment->id;
        /* Поиск ответов на этот комментарий (результат id ответов) */
        $repliesToComment = $comment->where('comment_id', $commentId)->get();
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
    public function deletingUserComments(Comment $comment)
    {
        // $userId = ($id!=null) ?  $id :  Auth::id();

        // dd($this->user->where('id', '=', $userId)->first()->comments);
        // dd($comment->where('author_id', '=', Auth::id())->get());

        if (isset($this->user->where('id', '=', Auth::id())->first()->id) == true) {
            /* Все комментарии и ответы на комметарии  пользователя */
            // $commentAll = User::find($userId)->comments;
            $commentAll = $this->user->where('id', '=', Auth::id())->first()->comments;
            /* Удаляем все комментарии */
            foreach ($commentAll as $comment) {
                $comment->delete();
            }

            /* Удаляем все ответы на комметарии */
            $replayAll = $comment->where('author_id', '=', Auth::id())->get();

            foreach ($replayAll as $replay) {
                $replay->delete();
            }
            return back()->with('status', 'Все комментарии и ответы удалены');
        }else{
            return back();
        }
    }

    /* Все комментарии и ответы и ответы авторизованного пользователя */
    public function showComments(Comment $comment)
    {
        return view('page-comments', [
            'users' => $this->user,
            /* Все комментарии */
            'comments' => $this->user->where('id', '=', Auth::id())->first()
                ->comments
                ->where('comment_id', '=', null),
            'replays' => $comment->where('author_id', '=', Auth::id())->get()
                ->where('comment_id', '!=', null)
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CommentController extends Controller
{
    use HasFactory;

    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    /* начальная загрузка */
    public function index($commentId)
    {
        return view('replay', [
            // 'users' => User::all(),
            'users' => $this->user,
            /* комментарии */
            'comment' => Comment::find($commentId),
        ]);
    }

    /* Добавляем комментарий */
    public function addComment(Request $request, $id)
    {
        /* id - номер пользователя, для которого записываем комментарий */

        /* Выполнить проверку на сущестрования id */
        $request->validate([
            'topic' => 'required',
            'comment' => 'required'
        ]);

        $userId = ($id!=null) ?  $id :  Auth::id();

        if (isset($this->user[$userId-1]->id) == true) {
            Comment::create([
            'user_id' => $userId,  // кому написали
            'author_id' => Auth::id(), // автор комментария
            'topic' => $request->topic,
            'comment' => $request->comment
            ]);
        }

        // $user = User::where('id' , '=' , $userId)->first();

        // if($user == null){
        //     return back();
        // }
        /* Добавляем комментарий */
        // $comment = new CommentController();
        // Comment::create([
        //     'user_id' => $userId,  // кому написали
        //     'author_id' => Auth::id(), // автор комментария
        //     'topic' => $request->topic,
        //     'comment' => $request->comment
        // ]);
        /* Переходим на страницу, где оставили комментарий */
        return back();
    }

    /* записываем ответ к комментарию */
    /* Функция принимает id комметария, для
    которого записываем ответ
     */
    public function addReplay(Request $request, $id)
    {
        $request->validate([
            'topic' => 'required',
            'comment' => 'required'
        ]);


        $comment = Comment::where('id' , '=' , $id)->first();
         // Проверка существования книги у текущего пользователя
        if($comment == null){
            return back();
        }

        $comment = new Comment();
        $comment->user_id = Comment::find($id)->user->id;  // кому написали
        $comment->author_id = Auth::id(); // автор комментария
        $comment->comment_id = $id;  // для какого комментария написан ответ
        $comment->topic = $request->topic;
        $comment->comment = $request->comment;
        $comment->save();

        /* Переходим обратно на страницу пользователя */
        $user = Comment::find($id)->user->id;
        return redirect('profile/' . $user);
    }


    public function store(Request $request, $id = null)
    {
        /* Формируем токен для текущего запроса */
        $token = $request->session()->token();

        $userId = ($id!=null) ?  $id :  Auth::id();

        if (isset($this->user[$userId-1]->id) == false) {
            return back();
        }
        
        // $count = collect(User::find($userId)->comments)->count();
        $count = collect($this->user[$userId-1]->comments)->count();

        /* Если комментариев больше 5, то показываем остальные комментарии */
        if($count > 5) {
            $comments = $this->user[$userId-1]->comments->take(5-$count)->all();
            /* Массив для передачи в json */
            $data = [];
            foreach ($comments as $comment)
            {
                /* Что бы отдельно не записывать комментарии
                * проверяем имеется ли запись в столбце commend_id,
                * если нет до формируем json
                */
                if(Comment::find($comment->id)->comment_id == null)
                {
                    /* Комментарии и ответы к комментариям */
                    $data[] =
                        [
                            'comments' =>
                                [
                                    /* id - комментария, на который нужно оставить отзыв */
                                    'id' => $comment->id,
                                    /* id текущего профиля */
                                    'user_id' => $comment->user->id,
                                    /* имя автора комментария??? */
                                    // 'author' => User::find($comment->author_id)->name,
                                    'author' => $this->user[$comment->author_id-1]->name,
                                    'topic' => $comment->topic,
                                    'comment' => $comment->comment,
                                    'token' => $token,
                                    /* Отзывы на комментарий */
                                    'replays' =>
                                        [
                                            'id' => collect(Comment::where('comment_id', '=', $comment->id)->get())
                                                ->map(function ($item){
                                                    return $item->id;
                                                })
                                                ->all(),
                                            /*'user_id' => Comment::find($comment->comment_id)->user_id,*/
                                            'author_id' => collect(Comment::where('comment_id', '=', $comment->id)->get())
                                                ->map(function ($item){
                                                    return
                                                        // User::find($item->author_id)->name;
                                                        $this->user[$item->author_id-1]->name;
                                                })
                                                ->all(),
                                            'topic_replay' => collect(Comment::where('comment_id', '=', $comment->id)->get())
                                                ->map(function ($item){
                                                    return $item->topic;
                                                })
                                                ->all(),
                                            'comment_replay' => collect(Comment::where('comment_id', '=', $comment->id)->get())
                                                ->map(function ($item){
                                                    return $item->comment;
                                                })
                                                ->all(),
                                        ]
                                ]
                        ];
                }

            }
        }



        return response()->json($data);
    }
}

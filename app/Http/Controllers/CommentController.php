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

    public function add($request, $id)
    {
        Comment::create([
            'user_id' => $id,  // кому написали
            'author_id' => Auth::id(), // автор комментария
            'topic' => $request->topic,
            'comment' => $request->comment
        ]);
    }

    /* записываем ответ к комментарию */
    /* Функция принимает id комметария, для
    которого записываем ответ
     */
    public function replayToComment(Request $request, $commentId)
    {
        $comment = new Comment();
        $comment->user_id = Comment::find($commentId)->user->id;  // кому написали
        $comment->author_id = Auth::id(); // автор комментария
        $comment->comment_id = $commentId;  // для какого комментария написан ответ
        $comment->topic = $request->topic;
        $comment->comment = $request->comment;
        $comment->save();
    }

    public function store(Request $request, $id = null)
    {
        /* Формируем токен для текущего запроса */
        $token = $request->session()->token();

        $userId = ($id!=null) ?  $id :  Auth::id();
        $count = collect(User::find($userId)->comments)->count();

        /* Если комментариев больше 5, то показываем остальные комментарии */
        if($count > 5) {
            $comments = User::find($userId)->comments->take(5-$count)->all();
            /* Массив для передачи в json */
            $data = [];
            foreach ($comments as $comment)
            {
//            dd(Comment::find($comment->id)->comment_id == null);
                /* Что бы отдельно не записывать комментарии
                * проверяем имеется ли запись в столбце commend_id,
                * если нет до формируем json
                */
                if(Comment::find($comment->id)->comment_id == null)
                {
//                $data[] = Comment::find($comment->id)->id;
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
                                    'author' => User::find($comment->author_id)->name,
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
                                                        User::find($item->author_id)->name;
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

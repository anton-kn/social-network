<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}

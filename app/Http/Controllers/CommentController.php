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
}

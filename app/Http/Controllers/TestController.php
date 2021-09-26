<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function exapmleAjax()
    {
        $comments = Comment::get();
        $data = [];
        foreach ($comments as $comment){
            $data[] = [
                'topic' => $comment->topic,
                'comment' => $comment->comment
            ];
        }
        return response()->json($data);

    }
}

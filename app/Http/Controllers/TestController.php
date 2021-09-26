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

    public function exapmleAjax($id)
    {
//        $comments = Comment::find($id);
        $data = [];
//        foreach ($comments as $comment){
//            $data[] = [
//                'topic' => $comment->topic,
//                'comment' => $comment->comment
//            ];
//        }
        $data[] = [
            'id' => User::find($id)->id,
            'name' => User::find($id)->name
        ];
        return response()->json($data);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {

        return view('test');
    }

    public function testValidate(Request $request)
    {
        $request->validate([
            'topic' => 'required|max:255',
            'comment' => 'required'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

/*
 * Профиль пользователя
 */
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    public function userProfile($id)
    {
        return view('profile', [
            'user' => User::findOrFail($id),
        ]);
    }
}
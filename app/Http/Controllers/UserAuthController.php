<?php

namespace App\Http\Controllers;

class UserAuthController extends Controller
{
    public function signUp()
    {
        $title = ['title' => '註冊'];
        return view('auth.signUp', $title);
    }
}

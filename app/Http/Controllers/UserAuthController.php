<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Services\UserAuthService;

class UserAuthController extends Controller
{
    protected $userAuthService;

    public function __construct(UserAuthService $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }

    public function signUp()
    {
        $title = ['title' => '註冊'];
        return view('auth.signUp', $title);
    }

    public function postSignUp(UserRegisterRequest $request)
    {
        $user = $this->userAuthService->register($request);
        // dd($user);
    }
}

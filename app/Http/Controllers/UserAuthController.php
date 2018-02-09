<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Services\UserAuthService;
use App\Services\MailService;

class UserAuthController extends Controller
{
    protected $userAuthService;

    public function __construct(UserAuthService $userAuthService, MailService $mailer)
    {
        $this->userAuthService = $userAuthService;
        $this->mailer = $mailer;
    }

    public function signUp()
    {
        $title = ['title' => '註冊'];
        return view('auth.signUp', $title);
    }

    public function postSignUp(UserRegisterRequest $request)
    {
        $nickname = ['nickname' => $request->nickname];

        $user = $this->userAuthService->register($request);
        $this->mailer->sendMail($nickname, $request->email);

        return redirect('/');
    }
}

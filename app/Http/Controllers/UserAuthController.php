<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Services\UserAuthService;
use App\Services\MailService;
use App\Http\Requests\UserLoginRequest;

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
        return view('auth.signUp', ['title' => '註冊']);
    }

    public function postSignUp(UserRegisterRequest $request)
    {
        $nickname = ['nickname' => $request->nickname];

        $user = $this->userAuthService->register($request);

        if ($user['msg']) {
            return redirect('user/auth/sign-up')->withErrors($user['msg'])->withInput();
        } else {
            $this->mailer->sendMail($nickname, $request->email);
        }

        return redirect('/');
    }

    public function signIn()
    {
        return view('auth.signIn', ['title' => '登入']);
    }

    public function postSignIn(UserLoginRequest $request)
    {
        $user = $this->userAuthService->checkEmail($request->email);

        if ($user['msg']) {
            $error_massage = ['msg' => '尚未註冊的信箱'];
            return redirect('user/auth/sign-in')->withErrors($error_massage)->withInput();
        } else {
            $check_password = $this->userAuthService->checkPassword($request->password, $user->password);

            if ($check_password['password']) {
                return redirect('user/auth/sign-in')->withErrors($check_password['password'])->withInput();
            } else {
                session()->put('user_id', $user->id);
                return redirect()->intended('/');
            }
        }
    }

    public function signOut()
    {
        session()->forget('user_id');
        return redirect('/');
    }
}

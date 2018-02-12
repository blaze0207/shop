<?php

namespace App\Services;

use App\Repositories\UserAuthRepository;
use Illuminate\Support\Facades\Hash;

class UserAuthService
{
    protected $userAuthRepository;

    public function __construct(UserAuthRepository $userAuthRepository)
    {
        $this->userAuthRepository = $userAuthRepository;
    }

    public function register($request)
    {
        $request['password'] = Hash::make($request['password']);
        return $this->userAuthRepository->register($request);
    }

    public function checkEmail($email)
    {
        return $this->userAuthRepository->checkUserLogInEmail($email);
    }

    public function checkPassword($password, $userPassword)
    {
        return $this->userAuthRepository->checkPassword($password, $userPassword);
    }
}

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

    public function register($registerInfo)
    {
        $registerInfo['password'] = Hash::make($registerInfo['password']);
        return $this->userAuthRepository->register($registerInfo);
    }
}

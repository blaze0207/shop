<?php

namespace App\Repositories;

use App\User;

class UserAuthRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($request)
    {
        return $this->user->register($request);
    }

    public function checkUserLogInEmail($email)
    {
        return $this->user->getUserInfo($email);
    }

    public function checkPassword($password, $userPassword)
    {
        return $this->user->checkPassword($password, $userPassword);
    }
}

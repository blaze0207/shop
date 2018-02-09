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

    public function register($registerInfo)
    {
        return $this->user->register($registerInfo);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'password', 'type', 'nickname'];
    protected $hidden = ['password', 'remember_token'];

    public static function register($userInfo)
    {
        $user = User::create($userInfo->all());

        if ($user) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }
}

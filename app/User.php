<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'password', 'type', 'nickname'];
    protected $hidden = ['password', 'remember_token'];

    public static function register($request)
    {
        if (User::where('email', $request->email)->first()) {
            return ['msg' => '此信箱已被使用'];
        }

        return User::create($request->all());
    }

    public static function getUserInfo($email)
    {
        if (!User::where('email', $email)->first()) {
            return ['msg' => '尚未註冊的信箱'];
        }

        return User::where('email', $email)->first();
    }

    public static function checkPassword($password, $userPassword)
    {
        $check_password = Hash::check($password, $userPassword);

        if (!$check_password) {
            return ['password' => '密碼驗證錯誤'];
        }
    }
}

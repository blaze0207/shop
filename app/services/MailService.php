<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMail($nickname, $user_Email)
    {
        Mail::send('email.singUpEmailNotification', $nickname, function ($message) use ($user_Email) {
            $message->from('shopLaravel@gmail.com');
            $message->to($user_Email);
            $message->subject('恭喜註冊 Shop Laravel 成功');
        });
    }
}

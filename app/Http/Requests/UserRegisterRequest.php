<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'required|max:50',
            'email' => 'required|max:150|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'type' => 'required|in:G,A',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => '暱稱不能為空',
            'nickname.max' => '暱稱不能大於 50 個字元',
            'email.required' => 'Email 不能為空',
            'email.max' => 'Email 長度不得超過 150 個字元',
            'email.email' => 'Email 格式錯誤',
            'password.required' => '密碼不能為空',
            'password.min' => '密碼不能少於 6 碼',
            'password.confirmed' => '兩次輸入密碼不一致',
            'password_confirmation.required' => '確認密碼不能為空',
            'password_confirmation.min' => '確認密碼不得少於 6 碼',
            'type.required' => '角色不能為空',
            'type.in' => '角色錯誤',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'required|max:150|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email 不能為空',
            'email.max' => 'Email 長度不得超過 150 個字元',
            'email.email' => 'Email 格式錯誤',
            'password.required' => '密碼不能為空',
            'password.min' => '密碼不能少於 6 碼',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required',
            'mail' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
        'username.required' => '必須項目です',
        'mail.email' => 'メールアドレスの形式で入力してください',
        'mail.required' => '必須項目です',
        'mail.unique' => '既に登録済みのメールアドレスです',
        'password.required' => '必須項目です',
        'password.confirmed' => 'パスワードが一致していません',
        'password_confirmation.required' =>'必須項目です',
        ];
    }
}

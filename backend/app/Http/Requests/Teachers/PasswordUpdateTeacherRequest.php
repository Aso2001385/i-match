<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateTeacherRequest extends FormRequest
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
            'password' => ['required','string','confirmed','min:8','regex:/(?=.*[a-z)(?=.*[A-Z])(?=.*[0-9])(?=.*[\/\-\_ΔΣΩ])[a-zA-Z0-9]/'],
        ];
    }
    public function messages()
    {
        return[
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードが8文字以上ではありません',
            'password.regex'=> 'パスワードが適切ではありません',
            'password.confirmed'=> 'パスワードが一致しません',
        ];
    }
}

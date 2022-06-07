<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'number' => 'required|string|max:7|min:7',
            'class' => 'required|string|max:30',
            'name' => 'required|string|max:30',
            'email' => ['required','email','max:23','unique:users','regex:/@s.asojuku.ac.jp$/'],
            'password' => ['required','string','confirmed','min:8','regex:/(?=.*[a-z)(?=.*[A-Z])(?=.*[0-9])(?=.*[\/\-\_ΔΣΩ])[a-zA-Z0-9]/'],
        ];
    }
    public function messages()
    {
        return[
            'number.required' => '学籍番号を入力してください',
            'number.max' => '7文字で入力してください',
            'number.min' => '7文字で入力してください',
            'class.required' => 'クラスを入力してください',
            'class.max' => '30文字以内で入力してください',
            'name.required' => '名前を入力してください',
            'name.max' => '30文字以内で入力してください',
            'email.required' => '学校用のメールアドレスを入力してください',
            'email.email' => '有効なメールアドレスではありません',
            'email.regex'=> 'メールアドレスが学校用ではありません',
            'email.unique'=> '登録済のメールアドレスです',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードが8文字以上ではありません',
            'password.regex'=> 'パスワードが適切ではありません',
            'password.confirmed'=> 'パスワードが一致しません',
        ];
    }
}

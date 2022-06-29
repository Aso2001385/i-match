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
            'name' => 'required|string|max:30',
            'email' => ['required','email','min:23','max:23','unique:users','regex:/@s.asojuku.ac.jp$/'],
            'password' => ['required','string','min:8','regex:/(?=.*[a-z)(?=.*[A-Z])(?=.*[0-9])(?=.*[\/\-\_ΔΣΩ])[a-zA-Z0-9]/'],
        ];
    }
    public function messages()
    {
        return[
            'name.required' => '名前を入力してください',
            'name.max' => '30文字以内で入力してください',
            'email.required' => '学校用のメールアドレスを入力してください',
            'email.email' => '有効なメールアドレスではありません',
            'email.regex'=> 'メールアドレスが学校用ではありません',
            'email.unique'=> '登録済のメールアドレスです',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードが8文字以上ではありません',
            'password.regex'=> 'パスワードが適切ではありません',            
        ];
    }
}

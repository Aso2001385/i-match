<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

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
            'email.min'=> '23文字で入力してください',
            'email.max'=> '23文字で入力してください',
            'email.unique'=> '登録済のメールアドレスです',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードが8文字以上ではありません',
            'password.regex'=> 'パスワードが適切ではありません',            
        ];
    }

    protected function failedValidation( Validator $validator )
    {
        $response['result'] = $validator->errors()->toArray();
        $response['status']=Response::HTTP_UNPROCESSABLE_ENTITY;

        throw new HttpResponseException(
            response()->json($response['result'],$response['status'])
        );
    }
}

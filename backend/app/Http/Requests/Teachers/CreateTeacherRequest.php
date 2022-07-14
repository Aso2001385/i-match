<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException; 
use Illuminate\Http\Response;

class CreateTeacherRequest extends FormRequest
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
            'email' => ['required','email','max:23','unique:teachers','regex:/@asojuku.ac.jp$/'],
            'password' => ['required','string','min:8','regex:/(?=.*[a-z)(?=.*[A-Z])(?=.*[0-9])(?=.*[\/\-\_ΔΣΩ])[a-zA-Z0-9]/'],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => '名前を入力してください',
            'name.string' => '文字列で入力してください',
            'name.max'=>'30文字以内で入力してください',
            'email.required'=>'メールアドレスを入力してください',
            'email.max'=>'23文字以内で入力してください',
            'email.unique'=>'登録済のメールアドレスです',
            'email.regex'=>'学校用メールアドレスを入力してください',
            'password.required'=>'パスワードを入力してください',
            'password.string'=> '文字列で入力してください',
            'password.min'=>'8文字以上で入力してください',
            'password.regex'=>'パスワードが適切ではありません'

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
